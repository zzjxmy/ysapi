<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Date: 2018/7/6
 * Time: 上午10:40
 */

class TestAction extends DWDData_Action{
    public function _exec()
    {
        return $this->renderSuccessJson(['data' => ['result' => 1111]]);
    }
}