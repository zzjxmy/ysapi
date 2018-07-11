<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Date: 2018/7/3
 * Time: 下午4:34
 */

class TestAction extends DWDData_Action{
    public function _exec()
    {
        $this->renderSuccessJson(array( 'data' => [111,222] ));
//        $request                = array(
//            'url'   => '/product/getaddress',
//            'data'  => array(
//                'addressId'        => '10000001',
//            ),
//            'method' => 'get',
//            'callWay' => 'rpc',
//        );
//
//        $response               = DWDData_Http::Call($request);
//        var_dump($request);
//        echo ($response);exit;
//        $inputData          = array(
//            'url'       => \Yaf\Registry::get('config')->internalapi->hostname . '/address/getaddress',
//            'method'    => 'get',
//            'data'      => array(
//                'addressId'        => '10000002',
//            ),
//            'key'       => 'address',
//            'callWay' => 'rpc',
//        );
//
//        $inputData2          = array(
//            'url'       => \Yaf\Registry::get('config')->internalapi->hostname . '/address/getaddress',
//            'method'    => 'get',
//            'data'      => array(
//                'addressId'        => '10000003',
//            ),
//            'key'       => 'addresstwo',
//            'callWay' => 'rpc',
//        );
//
//        $data               = array( $inputData, $inputData2);
//        $result           = DWDData_Http::MutliCall($data);
//        var_dump($result);
    }
}