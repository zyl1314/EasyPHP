<?php

//配置数据库
define('DB_NAME','project');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');

//可以访问的控制器及动作
$allow = array(
	'controllerAllow' => array('index'),
	'methodAllow' => array('index','infor')
);
