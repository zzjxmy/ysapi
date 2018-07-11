<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Date: 2018/7/4
 * Time: 上午10:11
 */

class TestTwoAction extends DWDData_Action{
    public function _exec()
    {
        var_dump(22222);
        return $this->renderSuccessJson(['data' => ['result' => true]]);
    }
}