<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'             =>  0, 
	 'TMPL_ACTION_ERROR'     =>  THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件 
    'URL_MODEL'             =>  1, 
	'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称 
    "SHOW_PAGE_TRACE"		=>   false,    //打开页面tp信息
    //自定义路径常量
    'TMPL_PARSE_STRING'  => array(
    	'__HOME__' => __ROOT__.'/Public/Home',
    	'__ADMIN__' => __ROOT__.'/Public/Admin',
        '__UPLOAD__'=>__ROOT__.'/Uploads',
    	),

    'LOAD_EXT_FILE' =>'tree',  //引入文件

   
    //数据库配置
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'shop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口

    'HTML_CACHE_ON'     =>    true,  //开启静态缓存
);