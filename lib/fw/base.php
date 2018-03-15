<?php
class FwBase{
    public static $module;
    public static $controller;
    public static $action;
    public static $param;
    public static $config;
    public static $baseUrl;
    public static $resourceUrl;
    public static $realRouter;
    
    public function __construct($_config) {
        FwBase::$config = $_config;
        FwBase::$baseUrl = $this->getBaseUrl();
        FwBase::$resourceUrl = FwBase::$baseUrl . '/' . FwBase::$config['resourceFolder'];
        spl_autoload_register('self::autoLoad');
    }
    
    private function getBaseUrl(){
        $currentPath = $_SERVER['PHP_SELF'];
        $pathInfo = pathinfo($currentPath);
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
        return $protocol . $hostName . ($pathInfo['dirname'] != '/' ? $pathInfo['dirname'] : '');  
    }
    
    public function autoLoad($class){
        $file = strtolower(str_replace('_',FwBase::$config['ds'],$class).'.php');
        if(file_exists('application'.FwBase::$config['ds'].$file)){
            include_once 'application'.FwBase::$config['ds'].$file;
        }else if(file_exists('lib'.FwBase::$config['ds'].$file)){
            include_once 'lib'.FwBase::$config['ds'].$file;
        }else if(file_exists('model'.FwBase::$config['ds'].$file)){
            include_once 'model'.FwBase::$config['ds'].$file;
        }else if(file_exists($file)){
            require_once "$file";
        }
    }
    
    public function run(){
        $module = FwBase::$config['defaultModule'];
        $controller = FwBase::$config['defaultController'];
        $action = FwBase::$config['defaultAction'];
        $param = array();
        if(isset($_GET['router'])){
            $routers = strtolower(rtrim($_GET['router'],'/\\'));
            unset($_GET['router']);
            foreach(FwBase::$config['routers'] as $key=>$value){
                $key = str_replace('/', '\/', $key);
                if(preg_match('/^'.$key.'/', $routers, $match)){
                    $routers = str_replace($match[0], $value, $routers);
                    break;
                }
                if($routers == $value){
                    $routers = 'index/error';
                    $param['code'] = '404';
                    $param['message'] = 'Request not found!';
                    break;
                }
            }
            FwBase::$realRouter = $routers;
            if(Fw_Helper::endsWith($routers,".html") && strlen($routers) > 5){
                $routers = substr($routers, 0, strlen($routers) - 5);
            }
            $routers = explode('/',$routers);
            if($routers[0] != '' && is_dir('application'.FwBase::$config['ds'].str_replace('-','',$routers[0]))){
                $module = str_replace('-','',$routers[0]);
                array_shift($routers);
            }
            if(isset($routers[0])){
                $filepath = 'application'.FwBase::$config['ds'].strtolower($module).FwBase::$config['ds'].'controller'.FwBase::$config['ds'].str_replace('-','',$routers[0]).'.php';
                if(file_exists($filepath)){
                    $controller = str_replace('-','',$routers[0]);
                    array_shift($routers);
                }
            }
            if(isset($routers[0])){
                $class = ucfirst($module).'_Controller_'.ucfirst($controller);
                if(method_exists($class, str_replace('-', '', $routers[0])) || $routers[0] == 'error'){
                    $action = str_replace('-','',$routers[0]);
                    array_shift($routers);
                }
            }
            if(isset($routers[0])){
                $param = $routers;
            }
        }
        FwBase::$module = $module;
        FwBase::$controller = $controller;
        FwBase::$action = $action;
        FwBase::$param = $param;
        if(strtolower($module) != strtolower(FwBase::$config['defaultModule'])){
            FwBase::$baseUrl .= '/' . ucfirst(strtolower($module));
        }
        $class = ucfirst($module).'_Controller_'.ucfirst($controller);
        $controller = new $class();
        if(method_exists($controller, 'init')){
            $controller->init();
        }
        $controller->view->setTitle(FwBase::$config['ogFb']['title']);
        $controller->view->setDescription(FwBase::$config['ogFb']['description']);
        $controller->view->setImage(FwBase::$config['ogFb']['image']);
        $controller->view->setType(FwBase::$config['ogFb']['type']);
        $controller->$action($param);
    }
    public static function app($_config){
        return new self($_config);
    }
}