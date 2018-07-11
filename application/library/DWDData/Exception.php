<?php
/**
 * @file Exception.php
 *
 * @author caowei
 *         @date 2015-08-21 下午4:27:10
 *         @brief 异常基类
 *
 */
class DWDData_Exception extends Yaf\Exception
{
    /*
     * 错误号前缀
     */
    public static $prefix = 9;
    
    protected static $_msg = null;
    
    const CONNECTOR        = ':_:';

    protected $_logHandle;
    
    public function __construct($message='unknow', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, abs(self::getPrefix()) . abs($code), $previous);
//        $this->_logHandle = new DWDData_Logger();
        $this->writeLog();
    }
    
    /**
     * [setMsg 设置错误信息]
     * @param [type] $msg [description]
     */
    public function setMsg($msg)
    {
        self::$_msg = $msg;
    }

    /**
     * [setMsg 获取错误信息]
     * @param [type] $msg [description]
     */
    public function getMsg()
    {
        if (self::$_msg === null) {
            return '系统错误';
        }
        return self::$_msg;
    }

    /**
     * [setMsg 获取错误前缀]
     * @param [type] $msg [description]
     */
    public static function getPrefix()
    {
        return self::$prefix;
    }

    /**
     * [setMsg 结果当做字符串]
     * @param [type] $msg [description]
     */
    public function __toString()
    {
        self::writeLog();
        return self::getMessage();
    }

    /**
     * [getLog 获取日志内容]
     * @return [type] [description]
     */
    public function getLog()
    {
        return '[file]' . parent::getFile() . self::CONNECTOR . '[line]' . parent::getLine() .
            self::CONNECTOR . '[code]' . self::getCode()    . self::CONNECTOR .
                '[message]' .  parent::getMessage() .'[trace]' . parent::getTraceAsString();
    }
    
    /**
     * [setMsg 写错误日志]
     * @param [type] $msg [description]
     */
    protected function writeLog()
    {
//        $this->_logHandle->addNotice('Exception_Code', self::getCode());
//        $this->_logHandle->error($this->getLog(), parent::getCode());
    }
}
