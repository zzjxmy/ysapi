<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Date: 2018/7/4
 * Time: 下午4:55
 */

class DWDData_HttpRequest extends \dwd\basesdk\BaseApi {

    private $host;
    private $callWay = 'curl';
    private $method = 'GET';
    private $url;

    public function __construct()
    {
        $this->host = \Yaf\Registry::get('config')->internalapi->hostname;
    }

    public function host($host){
        $this->host = $host;
        return $this;
    }

    public function callWay($callWay = 'curl'){
        $this->callWay = $callWay;
        return $this;
    }

    public function method($method = 'GET'){
        $this->method = $method;
        return $this;
    }

    public function url($url){
        $this->url = $url;
        return $this;
    }

    /**
     * 提供给 DWDData_Http调用的请求参数
     * @return array
     */
    public function getRequest()
    {
        return [
            'url'       => $this->url,
            'data'      => $this->params,
            'host'      => $this->host,
            'callWay'   => $this->callWay,
            'method'    => $this->method,
        ];
    }

    public function getData()
    {
        if(strtoupper($this->callWay) == 'RPC'){
            return $this->response;
        }else{
            return $this->response->body; // TODO: Change the autogenerated stub
        }
    }
}