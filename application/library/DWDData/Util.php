<?php
/**
 * @file Util.php
 *
 * @author caowei
 *         @date 2015-08-21 上午10:38:07
 *
 */
require 'vendor/autoload.php';

abstract class DWDData_Util
{

    /**
     * $keyPattern string
     * $params object
     *         vType  缓存类型
     *         middle 缓存Key中间部分
     *         last   缓存Key结尾部分
     * return  string
     */
    public static function getRedisKey($keyPattern, $params = array())
    {
        switch ($params['vType']) {
            case 'hash':
                $keyPattern = DWDData_Const::HASH_TYPE . $keyPattern;
                break;
            case 'kv':
                $keyPattern = DWDData_Const::KEYVALUE_TYPE . $keyPattern;
                break;
            case 'list':
                $keyPattern = DWDData_Const::LIST_TYPE . $keyPattern;
                break;
            case 'set':
                $keyPattern = DWDData_Const::SET_TYPE . $keyPattern;
                break;
            case 'zset':
                $keyPattern = DWDData_Const::SORT_SET_TYPE . $keyPattern;
                break;
            default:
                break;
        }

        return isset($params['middle']) ? sprintf($keyPattern, $params['middle'], $params['last']) : sprintf($keyPattern, $params['last']);
    }

    
    //获取客户端ip
    public static function getClientIp($type = 0)
    {
        $type       =   $type ? 1 : 0;
        static $ip  =   null;
        if ($ip !== null) {
            return $ip[$type];
        }

        if (isset($_SERVER['HTTP_X_REAL_IP'])) {//nginx 代理模式下，获取客户端真实IP
            $ip     =   $_SERVER['HTTP_X_REAL_IP'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {//客户端的ip
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {//浏览当前页面的用户计算机的网关
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown', $arr);
            if (false !== $pos) {
                unset($arr[$pos]);
            }
            $ip     =   trim($arr[0]);
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];//浏览当前页面的用户计算机的ip地址
        } else {
            $ip     =   '0.0.0.0';
        }

        // IP地址合法验证
        $long = sprintf("%u", ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);

        return $ip[$type];
    }

    //获取微秒
    public static function getmicrotime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    public static function getAccessToken($userId)
    {
        return md5(uniqid(mt_rand(), true) . $userId);
    }

    public static function getRandNum()
    {
        return md5(uniqid(mt_rand(), true));
    }

    //获取logid
    public static function getLogid()
    {
        return md5(uniqid(mt_rand(), true));
    }

    public static function isJson($str)
    {
        @json_decode($str);
        return (json_last_error() == JSON_ERROR_NONE);
    }


    public static function getInviteCode($userId)
    {
        $inviteCode  = strtoupper(dechex($userId));
        $inviteCode .= "X";
        $cnt         = strlen($inviteCode);
        for (; $cnt < 8; ++ $cnt) {
            $fillStr     = array('1','2','5','6','8','9','0','A','B','C','D','E','F');
            $rand        = rand(0, 12);
            $inviteCode .= $fillStr[$rand];
        }

        return $inviteCode;
    }

    public static function getCouponCode($userId, $couponId)
    {
        list($usec, $sec) = explode(" ", microtime());

        $prefixCode = strtoupper(base_convert($usec * 100000000, 10, 36)) . strtoupper(base_convert($userId, 10, 36));
        $suffixCode = strtoupper(base_convert($couponId, 10, 36)) . strtoupper(base_convert($sec, 10, 36));

        return $prefixCode . $suffixCode;
    }


    //处理fatal错误
    public static function dealFatalException($response)
    {
        $error   = error_get_last();
        if (isset($error['type'])) {
            $errMsg  = '';
            switch ($error['type']) {
                case E_ERROR:
                case E_PARSE:
                case E_DEPRECATED:
                case E_CORE_ERROR:
                case E_COMPILE_ERROR:
                    $message = $error['message'];
                    $file    = $error['file'];
                    $line    = $error['line'];
                    $errMsg  = "$message ($file:$line)\nStack trace:\n";
                    $trace   = debug_backtrace();
                    foreach ($trace as $i => $t) {
                        if (!isset($t['file'])) {
                            $t['file']     = 'unknown';
                        }
                        if (!isset($t['line'])) {
                            $t['line']     = 0;
                        }
                        if (!isset($t['function'])) {
                            $t['function'] = 'unknown';
                        }
                        $errMsg           .= "#$i {$t['file']}({$t['line']}): ";
                        if (isset($t['object']) && is_object($t['object'])) {
                            $errMsg       .= get_class($t['object']) . '->';
                        }
                        $errMsg           .= "{$t['function']}()\n";
                    }
            }

            DWDData_Logger::getInstance()->error($errMsg, DWDData_ErrorCode::SERVER_ERROR);
            ob_end_clean();
            $result    =  new DWDData_Result();
            $result->setErrno(DWDData_ErrorCode::SERVER_ERROR);
            $result->setErrmsg(DWDData_ErrorCode::SERVER_ERROR_MSG);
            $result->setData(array());
            $response->end($result->toJson());
        }
    }

    //隐藏手机号中间四位
    public static function hideMobile($mobile)
    {
        return  preg_replace('/(1[34578]{1}[0-9])[0-9]{4}([0-9]{4})/i', '$1****$2', $mobile);
    }

    //判断手机号
    public static function checkMobile($mobile)
    {
        if (preg_match("/^1[3456789]\d{9}$/", $mobile)) {
            return true;
        }

        return false;
    }

    public static function checkDateFormat($date, $format='Y-m-d')
    {
        switch ($format) {
            case 'Y-m-d':
                if (false == preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
                    return false;
                }
                break;
            default:
                break;
        }

        return true;
    }

    public static function checkSkuDealPrice($price, $skuInfo)
    {
        if (false == $skuInfo['enabled']) {
            throw new DWDData_Exception(DWDData_ErrorCode::SKU_OFFLIENDED_MSG, DWDData_ErrorCode::SKU_OFFLIENDED);
        }

      /*  if( $price < $skuInfo['lowest_price'] ){
            throw new DWDData_Exception( DWDData_ErrorCode::DEAL_PRICE_INVALID_MSG, DWDData_ErrorCode::DEAL_PRICE_INVALID );
        } */

        $priceDis      =  $skuInfo['price'] - $skuInfo['lowest_price'];
        $lastTime      =  strtotime($skuInfo['expired_date'] . ' 00:00:00') - $skuInfo['offline_before_expired'] - $skuInfo['seller_time'];
        $soldTime      =  time() - $skuInfo['seller_time'];

        if ($soldTime <= 0) {
            throw new DWDData_Exception(DWDData_ErrorCode::SKU_NOT_SELLING_MSG, DWDData_ErrorCode::SKU_NOT_SELLING);
        }

        if ($lastTime <= 0) {
            throw new DWDData_Exception(DWDData_ErrorCode::SKU_OFFLIENDED_MSG, DWDData_ErrorCode::SKU_OFFLIENDED);
        }

        if ($lastTime <= $soldTime) {
            throw new DWDData_Exception(DWDData_ErrorCode::SKU_STOP_SALE_MSG, DWDData_ErrorCode::SKU_STOP_SALE);
        }

        $unitPrice     =  $priceDis / $lastTime;
        $nowPrice      =  $skuInfo['price'] - $unitPrice * $soldTime;

        if ($nowPrice * 0.95 > $price) {
            throw new DWDData_Exception(DWDData_ErrorCode::DEAL_PRICE_INVALID_MSG, DWDData_ErrorCode::DEAL_PRICE_INVALID);
        }

        return true;
    }

    public function canOrderCancel($orderStatus, $deliveryStatus)
    {
        $canNotCancelStatus   =   array(
                                 //     DWDData_Const::$ORDER_STATUS['PAID'],
                                      DWDData_Const::$ORDER_STATUS['CANCELED'],
                                      DWDData_Const::$ORDER_STATUS['FINISHED'],
                                      DWDData_Const::$ORDER_STATUS['APPLY_REFUND'],
                                      DWDData_Const::$ORDER_STATUS['REFUNDING'],
                                      DWDData_Const::$ORDER_STATUS['REFUNDED'],
                                  );
        if (in_array($orderStatus, $canNotCancelStatus)) {
            return false;
        }
        
        if (($orderStatus == DWDData_Const::$ORDER_STATUS['PAID'] || $orderStatus == DWDData_Const::$ORDER_STATUS['REVIEWING'])
            && $deliveryStatus != DWDData_Const::$DELIVERY_STATUS['NON_DELIVERY']) {
            return false;
        }

        return true;
    }

    public static function arraySwap(&$array, $swap_a, $swap_b)
    {
        list($array[$swap_a], $array[$swap_b]) = array($array[$swap_b],$array[$swap_a]);
    }

    public static function getServerParams()
    {
        return array(
                   'REQUEST_METHOD'    => isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '',
                   'REQUEST_URI'       =>  isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '',
                   'REMOTE_ADDR'       =>  self::getClientIp(),
                   'SERVER_ADDR'       =>  isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '',
                   'SERVER_PORT'       =>  isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : '',
                   'SERVER_NAME'       =>  isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '',
                   'HTTP_HOST'            =>  isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '',
                   'HTTP_USER_AGENT'      =>  isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '',
                   'HTTP_ACCEPT_ENCODING' =>  isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : '',
                   'REQUEST_TIME_FLOAT'   =>  isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : '',
                   'HTTP_COOKIE'          =>  isset($_SERVER['HTTP_COOKIE']) ? $_SERVER['HTTP_COOKIE'] : '',
                   'REDIRECT_STATUS'      =>  isset($_SERVER['REDIRECT_STATUS']) ? $_SERVER['REDIRECT_STATUS'] : '',
               );
    }

    /**
     *
     * TODO
     * 待废弃
     * 请各位不要再使用了，相关的方法请移步 DWDData_RabbitMqUtil::getInstance()
     *
     **/
    public static function msgProducer($msg, $routingKey, $exchangeOption)
    {
        $config                 = Yaf\Registry::get("config");
        $amqpHost               = $config->amqp->host;
        $amqpPort               = $config->amqp->port;
        $amqpUserName           = $config->amqp->username;
        $amqpPassWord           = $config->amqp->password;

        $con = array(
             'default' => new \PhpAmqpLib\Connection\AMQPLazyConnection($amqpHost, $amqpPort, $amqpUserName, $amqpPassWord, '/')
         );
        $registry = new \Thumper\ConnectionRegistry($con, 'default');
        $producer = new \Thumper\Producer($registry->getConnection());
        $producer->setExchangeOptions($exchangeOption);
        if (is_array($msg)) {
            $msg = json_encode($msg);
        }
        $producer->publish($msg, $routingKey);
    }

    /*
     *　推送消息到消息中心
     *  走单利模块
     * */
    public static function pushMsgToMsgCenter($msgInfo, $queue = null)
    {
        $exchangeName   = \Yaf\Registry::get('config')->rabbitmq->exchange->name;
        $routingKey     = empty($queue) ? \Yaf\Registry::get('config')->hsq->msgcenter->user_notification : $queue;
        $exchangeOption = array(
            'name' => $exchangeName,
            'type' => 'direct'
        );
        
        $rabbitMQUtil = DWDData_RabbitMqUtil::getInstance();
        return $rabbitMQUtil->msgProducer($msgInfo, $routingKey, $exchangeOption);
    }

    public static function getSysConfigParams($name, $type = DWDData_Const::SYS_CONFIG_TYPE_INTERNAL_API)
    {
        $m_sysConfig            = new SysConfigModel;
        $sysConfig              = $m_sysConfig->getSystemConfig($name, $type);
        if (false == empty($sysConfig)) {
            $sysConfig['value'] = json_decode($sysConfig['value'], true);
            return $sysConfig['value'];
        }
        return $sysConfig;
    }

    public static function writeln($msg = '')
    {
        if ($msg) {
            echo '['.date('Y-m-d H:i:s').']: '.$msg.PHP_EOL;
        } else {
            echo PHP_EOL;
        }
    }
    
    public static function pushRefundOrderToQueue($orderId, $traceType = 0)
    {
        $config                  = Yaf\Registry::get("config");
        $exchange                = $config->rabbitmq->exchange->topic;
        $routing                 = 'wdt_refund_order';
        $exchangeOption          = array(
                                       'name'=> $exchange,
                                       'type'=> DWDData_Const::$EXCHANGE_TYPE['TOPIC'],
                                   );
        $rabbitMqUtil            = DWDData_RabbitMqUtil::getInstance();
        $rabbitMqUtil->msgProducer($orderId, $routing, $exchangeOption);

        $tracePrefix             = 'complete';
        if (DWDData_Const::REFUND_ORDER_TRANCE_TYPE_APPLY_REFUND == $traceType) {
            $tracePrefix         = 'apply';
        } elseif (DWDData_Const::REFUND_ORDER_TRANCE_TYPE_REFUND_REFUSE == $traceType) {
            $tracePrefix         = 'refuse';
        }
        DWDData_Logger::getInstance()->trace(sprintf('%s refund order %s '. date('Y-m-d H:i:s')."\n\r", $tracePrefix, $orderId));
    }
    
    public static function checkDelivery($provinceId, $merchantId, $sourceType)
    {
        $m_merchantDeliveryRange     =   new MerchantDeliveryRangeModel;
        $deliveryRange               =   $m_merchantDeliveryRange->getMerchantDeliveryRangeWithProvince($merchantId, $provinceId, $sourceType);
        
        if (!$deliveryRange) {
            return false;
        }
        return true;
    }

    public static function checkNewUser($userId) 
    {
        $transactionStatus      = DWDData_Const::$ORDER_STATUS;
        $isNewUser              = true;
        unset($transactionStatus['ALL']);
        unset($transactionStatus['CANCELED']);
      

        $m_tradeOrder        = new TradeOrderModel();
 
        $conditions          = array(
                                   array(
                                       'field'      => 'user_id',
                                       'value'      => $userId,
                                       'op'         => '=',
                                   ),
                                   array(
                                       'field'      => 'pay_time',
                                       'value'      => 0,
                                       'op'         => '>',
                                   ),
                               );
  
        $totalCnt                = $m_tradeOrder->getTradeOrderListCnt($conditions) ? : 0;

        if ($totalCnt > 0) {
            $isNewUser           = false;
        }
        
        $transactionStatus  = array_values($transactionStatus);
        $m_tradeOrder       = new TradeOrderModel;
        $conditions         = array(
                                    array(
                                        'field'      => 'user_id',
                                        'value'      => $userId,
                                        'op'         => '=',
                                    ),
                                     array(
                                       'field'       => 'status',
                                       'values'      => $transactionStatus,
                                       'op'          => 'in',
                                     )
                               );

        $totalCnt           = $m_tradeOrder->getListCntByConditions($conditions);
        if ($isNewUser && $totalCnt == 0) {
            return true;
        }
        return false;
    }

    public static function arrayRandom($arr, $num = 1, $exceptId) {
        shuffle($arr);

        $r          = array();
        $count      = count($arr);
        $currentNum = 0;

        for ($i = 0; $i < $count; $i++) {
            if ($exceptId && ($exceptId == $arr[$i] || $exceptId == $arr[$i]['id'])) {
                continue;
            }
            $r[]    = $arr[$i];
            $currentNum ++;
            if ($currentNum >= $num) {
                break;
            }
        }

        return $r;
    }
    
    public static function simpleHash($str){
        $n = 0;
        for ($c=0; $c < strlen($str); $c++)
            $n += ord($str[$c]);
            
        return $n;
    }
    /**
     * [sendWechantTmp 发送模板消息]
     * @param  [type] $userId   [用户id]
     * @param  [type] $sendType [场景值]
     * @param  [type] $content  [业务发的参数]
     * @return [type]           [description]
     */
    public static function sendWechantTmp($userId,$sendType,$content)
    {
        $postUrl  = Yaf\Registry::get("config")->messagecenter->hostname;
        $request = [
            'host' => $postUrl,
            'url' => '/wechant/wechanttmpsend',
            'data' => [
                        'userId'    => $userId,
                        'sendType'  => $sendType,
                        'content'   => json_encode($content),
                    ],
            'method' => 'post',
        ];
        $response   = DWDData_Http::Call($request);
        $response   = json_decode($response, true);
        if($response['errno']!=0)
        {
            DWDData_Logger::getInstance()->trace('微信模板调用消息中心失败:'.$userId.'业务方:'.$sendType.',body:'.json_encode($response));
        }
        return true;
    }

    /**
     * 隐藏隐私信息
     * @param string $str
     * @param string $padding 中间填充字符串
     * @return string
     */
    public static function filterSecretStr($str, $padding = '***')
    {
        if (empty($str)) {
            return '';
        }

        return mb_substr($str, 0, 1) . $padding . mb_substr($str, -1);
    }

}
