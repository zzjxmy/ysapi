<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Date: 2018/7/3
 * Time: 下午4:34
 */

class TestController extends Yaf\Controller_Abstract
{

    public $actions = [
        'test' => 'actions/test/Test.php',
        'testtwo' => 'actions/test/TestTwo.php',
    ];

//    public function testAction(){
//        $response = $this->getResponse();
//        $response->setBody(111);
//    }
//
//    public function testTwoAction(){
//        $response = $this->getResponse();
//        $response->setBody(222);
//    }
//
//    public function testThreeAction(){
//        $request                = array(
//            'url'   => '/ump/getaddress',
//            'data'  => array(
//                'addressId'        => '10000001',
//            ),
//            'method' => 'get',
//            'callWay' => 'rpc',
//        );
//
//        $response               = DWDData_Http::Call($request);
//        echo ($response);exit;
//    }
}
