<?php
/**
 * @file RequestBase.php
 *
 * @author caowei03
 *         @date 2015-08-21 下午01:30:52
 *         @brief Request参数基类
 *         原则见下:
 *         1 必须参数
 *         2 非必须\
 *         参数
 *         4 默认参数校验自动化机制
 *         5 是否检验登录机制
 *         6 检查输入
 *         7 设置输入
 *         8 用的时候再进行检测
 *         9 初始化的时候用自动set函数;获取数据的时候自动使用get函数;
 */
class DWDData_Request
{
    /*
     * 原始数据直接从yaf中拿,这个参数保留的是整理后的参数; 理论上可以直接使用;
     */
    private $_sourceParams = array();
    
    /*
     * 缓存的用户信息
     */
    private $_userinfo = null;
    
    /*
     * 流数据
     */
    private $_stream;
    
    /*
     * hookInstance;
     */
    private $_hookInstance = null;
      
    /*
     * 请求类型
     */
    protected $_method = null;

    /*
     * 是否强校验auth
     */
    protected $_needauth = false;
      
    /*
     * 版本号
     */
    protected static $_version;
    
    /*
     * 必须校验参数 array('sign','version')
     */
    protected $_focusParams = array();
    
    public $_logHandle;
    /*
     * 初始化
     */
   public function __construct()
   {
       $this->init();
   }

    /*
     * 初始化
     */
    public function init()
    {
        $this->_logHandle = DWDData_Logger::getInstance();
        $this->initHook();
        $this->initEnv();
        $this->initParams();
        $this->checkParams();
    }
    
    /*
     * 初始化hook
     */
    public function initHook()
    {
        return false;
    }
    
    /*
     * 初始化一些环境变量和必须的配置
     */
    public function initEnv()
    {
        $this->_method = $this->serverEnv('request_method');
    }
    
    /*
     * 获取SERVER中的信息
     */
    public function serverEnv($key = null)
    {
        if ($key !== null) {
            return isset($_SERVER[$key]) ? $_SERVER[$key] : HttpServer::$server[$key];
        } else {
            return $_SERVER;
        }
    }
    /*
     * 初始化Params到Request类;
     */
    public function initParams()
    {
        try {
            if (class_exists('Yaf\Dispatcher')) {
                $params = Yaf\Dispatcher::getInstance()->getRequest()->getParams();
                if (!empty($params)) {
                    foreach ($params as $key => $value) {
                        $_GET[$key] = $value;
                    }
                }
            }

            $requestGet          = HttpServer::$get;
            $requestPost         = HttpServer::$post;
            $inputParams         = array_merge($requestGet, $requestPost);
             
       //     DWDData_Logger::getInstance()->trace('request input is' . var_export($inputParams, true));
            $this->_sourceParams = $inputParams;
            foreach ($this->_sourceParams as $key => $value) {
                $this->setParam($key, $value);
            }
        } catch (Exception $e) {
            $this->_logHandle->error($e->getMessage(), $e->getCode());
        }
    }
    /*
     * 子类覆盖用; 检查参数机制
     */
    public function checkParams()
    {
        if ($this->getParam('pageLimit') != null && intval($this->getParam('pageLimit')) >= DWDData_Const::MAX_PAGE_LIMIT) {
            $this->setParam('pageLimit', DWDData_Const::MAX_PAGE_LIMIT);
        }
    }
    /*
     * 是否有这个参数;
     */
    final public function issetParam($key)
    {
        if (isset($this->_sourceParams[$key])) {
            return true;
        }
        return false;
    }
    
    /*
     * 获取所有的参数,这里的请求是已经所有set过的数据;
     */
    public function allParams()
    {
        $allParams = array();
        foreach ($this->_sourceParams as $key => $value) {
            $allParams[$key] = $this->getParam($key);
            if ($allParams[$key] === null) {
                unset($allParams[$key]);
            }
        }
       // $this->_logHandle->trace('request allParams is ' . var_export($allParams, true));
        return $allParams;
    }
    
    /*
     * 设置是否强校验pass
     */
    public function needauth($needpass = false)
    {
        $this->_needpass = $needpass ;
    }
    /*
     * 获取是否强校验pass的定义;
     */
    public function isNeedauth()
    {
        $this->initUserinfo();
        return $this->_needpass;
    }
 
    
    /*
     * 忽略系统参数,在action中处理
     */
    private function setSign($v)
    {
        //DWDData_Logger::getInstance()->addNotice('sign', $v);
        return;
    }
    /*
     * 忽略系统参数,在action中处理
     */
    private function setV($v)
    {
        //DWDData_Logger::getInstance()->addNotice('v', $v);
        $this->_sourceParams['v'] = $v;
        return;
    }
    /*
     * 忽略系统参数,在action中处理
     */
    private function setMethod($value)
    {
        //DWDData_Logger::getInstance()->addNotice('method', $value);
        return;
    }
    
    
    private function setTimestamp($value)
    {
        $this->_sourceParams['timestamp'] = trim($value);
    }
    
    /*
     * 获取值;
     */
    public function getParam($key, $default = null)
    {
        $method_name = 'get' . ucfirst(strtolower($key));
        if (method_exists($this, 'get' . ucfirst(strtolower($key)))) {
            return $this->$method_name();
        } elseif (isset($this->_sourceParams[$key])) {
            return $this->_sourceParams[$key];
        } else {
            return $default;
        }
    }
    
    /*
     * 设置值
     */
    public function setParam($key, $value)
    {
        $method_name = 'set' . ucfirst(strtolower($key));
        if ($value === null && isset($this->_sourceParams[$key])) {
            unset($this->_sourceParams[$key]);
        } elseif (method_exists($this, $method_name)) {
            $this->$method_name($value);
        } elseif ($key == '_sourceParams') {
            // $this->_sourceParams = $value;这个不执行,只能在init的时候执行;
        } else {
            $this->_sourceParams[$key] = $value;
        }
    }

    public function __get($key)
    {
        return $this->getParam($key);
    }

    public function __set($key, $value)
    {
        $this->setParam($key, $value);
    }
}
