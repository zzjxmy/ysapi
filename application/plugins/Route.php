<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Date: 2018/7/10
 * Time: 上午9:23
 */
use \Yaf\Plugin_Abstract;
use \Yaf\Request_Abstract;
use \Yaf\Response_Abstract;

class RoutePlugin extends Plugin_Abstract
{
    public function routerStartup(Request_Abstract $request, Response_Abstract $response) {

    }
    public function routerShutdown(Request_Abstract $request, Response_Abstract $response){
        $module = $request->getModuleName();
        $controllerName = $request->getControllerName();
        $actionName = $request->getActionName();
        $applicationPath = \Yaf\Application::app()->getConfig()->get('application')->get('directory');
        $lastPath = '/controllers/' . ucfirst($controllerName) . '.php';
        if(strtolower($module) != 'index'){
            $file = $applicationPath . '/modules/' . $module . $lastPath;
        }else{
            $file = $applicationPath . $lastPath;
        }
        if(!file_exists($file)){
            throw new Exception($controllerName . ' controller not exists');
        }

        $controllerName = $controllerName . 'Controller';
        $ref = new ReflectionClass($controllerName);
        $methods = $ref->getMethods(ReflectionMethod::IS_PUBLIC);
        $actionsName = [];
        foreach ($methods as $method) {
            $len = strlen($method->getName());
            if (substr($method->getName(), $len - 6) == 'Action') {
                $action = strtolower(substr($method->getName(), 0, $len - 6));
                $actionsName[] = $action;
            }
        }

        if ($ref->hasProperty('actions')) {
            $actions = $ref->newInstanceWithoutConstructor()->actions;

            if (!empty($actions)) {
                foreach ($actions as $key => $action) {
                    $actionsName[] = $key;
                }
            }
        }

        if(!in_array($actionName, $actionsName)){
            throw new Exception('方法不存在的');
        }
    }
}