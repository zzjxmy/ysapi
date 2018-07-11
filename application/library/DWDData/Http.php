<?php
/**
 * Created by PhpStorm.
 * User: caowei
 * Date: 8/24/15
 * Time: 17:48
 */

class DWDData_Http
{
    private $_responses  = array();

    const  API_SERVER    = 'http://localhost:9501';//'http://cron.wx.jaeapp.com';

    public function __construct()
    {
    }

    protected static function _initPreRequestId($request)
    {
        if (false == isset(HttpServer::$server['request_id'])) {
            return $request;
        }

        if (!isset($request['data'])) {
            $request['data'] = array(
                'preRequestId'  => HttpServer::$server['request_id'],
            );
        } elseif (is_array($request['data'])) {
            $request['data']['preRequestId'] = HttpServer::$server['request_id'];
        }

        return $request;
    }

    public static function getInternalApiServer()
    {
        $config          = Yaf\Registry::get("config");
        return $config->internalapi->hostname;
    }

    public static function callback($data, $delay)
    {
        usleep($delay);
        return $data;
    }

    public static function PackageGetRequest(&$ch, $request, $timeout = 10)
    {
        $request         = self::_initPreRequestId($request);
        $path            =  http_build_query($request['data']);
        $url             =  isset($request['host']) ? $request['host'] : SELF::getInternalApiServer();
        $request['url'] .= '?' . $path;
        curl_setopt($ch, CURLOPT_URL, $url . $request['url']);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
    }

    public static function PackagePostRequest(&$ch, $request, $timeout = 10)
    {
        $request         = self::_initPreRequestId($request);
        $url             =  isset($request['host']) ? $request['host'] : SELF::getInternalApiServer();

        curl_setopt($ch, CURLOPT_URL, $url . $request['url']);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request['data']);
    }

    public function processMutliReseout($instance)
    {
        $this->_responses[$instance->id] = $instance->response;
    }

    public function getResponse()
    {
        ksort($this->_responses);
        return $this->_responses;
    }

    public static function Call($request, $retry = 1, $timeout = 10)
    {
        $retryTimes           = 0;
        $response             = false;
        while ($retryTimes < $retry) {
            try{
                $response = self::buildRequest($request, $timeout)->getResult();
                var_dump($response);
                if(is_array(json_decode($response, true))){
                    return $response;
                }else{
                    $response = false;
                }
            }catch (Exception $exception){
                $response = false;
                continue;
            }
            ++ $retryTimes;
        }

        return $response;
    }

    public static function MutliCall($requests, $delay = 0)
    {
        $keyMap = $map                     = array();
        $responses        = array();

        foreach ($requests as $reqId => $request) {
            $urlInfo = parse_url($request['url']);
            $request['host'] = $urlInfo['scheme'] . '://' . $urlInfo['host'];
            $request['url'] = $urlInfo['path'];
            $map[] = self::buildRequest($request);
            $keyMap[] = $request['key'];
        }

        DWDData_HttpRequest::exec(...$map);
        foreach ($map as $key => $httpRequestObj){
            $responses[$keyMap[$key]] = $httpRequestObj->getData();
        }
        return $responses;
    }

    public static function buildRequest($request, $timeout = 10){
        $httpRequest = (new DWDData_HttpRequest())->url($request['url'])->method($request['method']);
        if(isset($request['host'])){
            $httpRequest = $httpRequest->host($request['host']);
        }

        if(isset($request['callWay'])){
            $httpRequest = $httpRequest->callWay($request['callWay']);
        }

        if(!isset($request['data'])){
            $request['data'] = [];
        }

        return $httpRequest->setParams($request['data'])->setTimeOut($timeout);
    }

    /*
 * raw格式消息发送
 * */
    public static function rawCurl($url, $data_string)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
