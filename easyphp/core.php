<?php
class Core{
	function run(){
		 spl_autoload_register('self::autoload');
		 $this->route();
		 $this->setReporting();	
	}
	//自动载入
	static function autoload($class){
        $frameworks = APP_PATH . 'easyphp/' . $class . '.class.php';
        $controllers = APP_PATH . 'application/controllers/' . $class . '.class.php';
        $models = APP_PATH . 'application/models/' . $class . '.class.php';

        if (file_exists($frameworks)) {
            // 加载框架核心类
            include $frameworks;
        } elseif (file_exists($controllers)) {
            // 加载应用控制器类
            include $controllers;
        } elseif (file_exists($models)) {
            //加载应用模型类
            include $models;
        } else {
            /* 错误代码 */
        }
	}
	//路由处理
	function route(){
		$controllerName = 'Index';
		$action = 'index';
		if(!empty($_GET['url'])){
			$url = 	$_GET['url'];
			$urlArray = explode('/',$url);
			//获取控制器
			$controllerName = ucfirst(in_array($urlArray[0],$this->config['controllerAllow'])?$urlArray[0]:'index');			
			array_shift($urlArray);
			//获取动作
			$action = in_array($urlArray[0],$this->config['methodAllow'])?$urlArray[0]:'index';
			array_shift($urlArray);
			$queryString = $urlArray;	
		}
		$queryString = empty($queryString)?array():$queryString;
		$controller = $controllerName . 'Controller';
		//实例化控制器		
		$dispatch = new $controller($controllerName,$action);
		call_user_func_array(array($dispatch, $action), $queryString);
	}
	
    // 检测开发环境
    function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
        }
    }
	
	function __construct($arr){
		$this->config = $arr;
	}
}


