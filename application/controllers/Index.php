<?php
class IndexController extends \core\controllerIndex
{
	public function indexAction(){
		try {
			$this->setBody(111);
		} catch (\Exception $e) {
			$this->setErr($e,__METHOD__);
		}
	}
	public function index2Action(){
		try {
			$this->setBody(222);
		} catch (\Exception $e) {
			$this->setErr($e,__METHOD__);
		}
	}
	public function index3Action(){
		try {
			$this->setBody(333);
		} catch (\Exception $e) {
			$this->setErr($e,__METHOD__);
		}
	}
}