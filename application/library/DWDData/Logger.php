<?php

/***************************************************************************
 *
 * Copyright (c) 2013 Baidu.com, Inc. All Rights Reserved
 *
**************************************************************************/

/**
 * @file Logger.php
 *
 * @author caowei
 * @date 2015-08-21 00:50:00
 * @brief 日志类
 *
 */
class DWDData_Logger
{

    /**
     * log params data
     * @var array
     */
    private $_logParams =  array();
    
    /**
     * Valid PHP date() format string for log timestamps
     * @var string
     */
    private static $dateFormat = 'Y-m-d G:i:s.u';

    /**
     * file log type
     * @var integer
     */
    private static $_fileLog    = 3;

    /**
     * Path to the log file
     * @var string
     */
    private static $_logFilePath = '/tmp/internal_api.log.';

    private static $arrInstance  = array();
    public static $current_instance;

    public function __construct($logpath = '/tmp/internal_api.log.')
    {
        $config                  = Yaf\Registry::get("config");
        self::$_logFilePath      = empty($config->log->path) ? $logpath : $config->log->path;
    }

    // 获取指定App的log对象，默认为当前App
    /**
     *
     * @return DWDData_Log
     * */
    public static function getInstance($app = null, $logType=null)
    {
        if (empty($app)) {
            $app = 'HSQInternalApi';
        }

//        if (empty(self::$arrInstance[$app])) {
//            $config                  = \Yaf\Registry::get("config");
//            self::$arrInstance[$app] = new DWDData_Logger($config->log->path);
//        }

        return new static();
    }

    /**
     * [addNotice 添加日志字段]
     * @param [type] $logKey   [日志字段]
     * @param [type] $logValue [打印值]
     */
    public function addNotice($logKey, $logValue)
    {
        $this->_logParams[$logKey] = $logValue;
    }
    
    /**
     * [notice 打印一般日志]
     * @return [type] [description]
     */
    public function notice()
    {
//        $config                  = \Yaf\Registry::get("config");
//        self::$_logFilePath      = $config->log->path;
//
//      //  swoole_async_write( self::$_logFilePath . date('YmdH'), self::formatMessage() );
//        error_log(self::formatMessage(), self::$_fileLog, self::$_logFilePath . date('YmdH'));
    }

    /**
     * [error 打印错误日志]
     * @return [type] [description]
     */
    public function error($message, $code = 0)
    {
        //$logContent   = PHP_EOL . date("Y-m-d H:i:s") . "error_code[$code]\n" . "$message" . PHP_EOL;
//        $logContent     = array(
//                              'timestamp' => date("Y-m-d H:i:s"),
//                              'code'      => $code,
//                              'msg'       => $message,
//                          );
//        error_log(json_encode($logContent) . PHP_EOL, self::$_fileLog, self::$_logFilePath . 'err.' . date('YmdH'));
    }

    /**
     * [trace 打印调试日志]
     * @return [type] [description]
     */
    public function trace($message)
    {
        $logContent   = '['. date('Y-m-d H:i:s', time()).' ]: ' .$message .PHP_EOL;
        error_log($logContent, self::$_fileLog, self::$_logFilePath . 'debug.' . date('YmdH'));
    }

    /**
     * Formats the message for logging.
     *
     * @param  string $level   The Log Level of the message
     * @param  string $message The message to log
     * @param  array  $context The context
     * @return string
     */
    private function formatMessage()
    {
        /*$formatMessage      = PHP_EOL;
        foreach ( $this->_logParams as $key => $value)
        {
        	$logkey         = '';
        	$logValue       = '';

        	if( is_string( $key ) )
        	{
        		$logkey     = self::indent($value);
        	}
        	else
        	{
        		$logkey     = self::indent(self::contextToString($value));
        	}

        	if( empty( $value ) )
        	{
        	}
        	else if( is_string( $value ) )
        	{
        		$logValue   = self::indent($value);
        	}
        	else
        	{
        		$logValue   = self::indent(self::contextToString($value));
        	}

        	$formatMessage .= $logkey . '[' .$logValue . ']';
        }

        return "[{$this->getTimestamp()}] {$formatMessage}".PHP_EOL; */
        $this->_logParams['time'] = date("Y-m-d H:i:s");//DWDData_Util::getmicrotime();
        return json_encode($this->_logParams) . PHP_EOL;
    }

    /**
     * Gets the correctly formatted Date/Time for the log entry.
     *
     * PHP DateTime is dump, and you have to resort to trickery to get microseconds
     * to work correctly, so here it is.
     *
     * @return string
     */
    private static function getTimestamp()
    {
        $originalTime = microtime(true);
        $micro        = sprintf("%06d", ($originalTime - floor($originalTime)) * 1000000);
        $date         = new DateTime(date('Y-m-d H:i:s.'.$micro, $originalTime));
        return $date->format(self::$dateFormat);
    }

    /**
     * Takes the given context and coverts it to a string.
     *
     * @param  array $context The Context
     * @return string
     */
    private static function contextToString($context)
    {
        $export      = '';
        foreach ($context as $key => $value) {
            $export .= "{$key}: ";
            $export .= preg_replace(array(
                '/=>\s+([a-zA-Z])/im',
                '/array\(\s+\)/im',
                '/^  |\G  /m',
            ), array(
                '=> $1',
                'array()',
                '    ',
            ), str_replace('array (', 'array(', var_export($value, true)));
            $export .= PHP_EOL;
        }
        return str_replace(array('\\\\', '\\\''), array('\\', '\''), rtrim($export));
    }

    /**
     * Indents the given string with the given indent.
     *
     * @param  string $string The string to indent
     * @param  string $indent What to use as the indent.
     * @return string
     */
    private static function indent($string, $indent = '    ')
    {
        return $indent.str_replace("\n", "\n".$indent, $string);
    }

    /**
     * [netrcd 打印网络日志]
     * @return [type] [description]
     */
    public function netrcd($request, $response, $cost)
    {
        $logData      = array(
            'request'   => $request,
            'response'  => $response,
            'cost'      => $cost,
        );
        $logContent   = json_encode($logData) . PHP_EOL;
        error_log($logContent, self::$_fileLog, self::$_logFilePath . 'netrcd.' . date('YmdH'));
    }
}
