<?php 
/**
 * @file Abstract.php
 *
 * @author caowei
 *         @date 2015-08-21 上午10:38:07
 *         @brief Controller基类
 *
 */
abstract class DWDData_Base extends Yaf\Controller_Abstract
{
    public function init()
    {
        Yaf\Dispatcher::getInstance()->disableView();
    }
}
