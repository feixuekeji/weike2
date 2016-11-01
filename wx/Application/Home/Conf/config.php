<?php

return array (

		// '配置项'=>'配置值'


		'URL_PATHINFO_DEPR' => '/',
        'MODULE_ALLOW_LIST'    =>    array('Home'),
        'DEFAULT_MODULE'       =>    'Home',

		'URL_MODEL' => 2, // URL访问模式,可选参数0、1、2、3,代表以下四种模式：

		// 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE 模式); 3 (兼容模式) 默认为PATHINFO 模式

		'DB_TYPE' => 'mysql', // 数据库类型

		'DB_HOST' => '127.0.0.1', // 服务器地址

		'DB_NAME' => 'wx', // 数据库名

		'DB_USER' => 'root', // 用户名

		'DB_PWD' => '123', // 密码

		'DB_PORT' => 3306, // 端口



		'DB_CHARSET' => 'utf8', // 字符集

		 'SHOW_PAGE_TRACE' => TRUE,

		//'SHOW_PAGE_TRACE' => FALSE

);