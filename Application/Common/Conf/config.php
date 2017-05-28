<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'             =>  0, 
	 'TMPL_ACTION_ERROR'     =>  THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件 
    'URL_MODEL'             =>  1, 
	'DEFAULT_MODULE'        =>  'Admin',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Login', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login', // 默认操作名称 
    "SHOW_PAGE_TRACE"		=>   true,    //打开页面tp信息
    'TMPL_PARSE_STRING'  => array(
    	'__HOME__' => __ROOT__.'/Public/Home',
    	'__ADMIN__' => __ROOT__.'/Public/Admin',
    	)
);