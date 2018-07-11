<?php
/**
 * @name AddressController
 * @author cway
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class AddressController extends DWDData_Base
{
    public $actions = array(
                        'getaddress'          => 'actions/address/GetAddress.php',
//                        'test'          => 'actions/Address/Test.php',
                    );

//    public function getAddressAction(){
//        $response = $this->getResponse();
//        $response->contentBody = [
//            'code'=>(int)1111,
//            'info'=>(string)'2222',
//            'data'=>['ssss' => 'wwww']
//        ];
//    }
}
