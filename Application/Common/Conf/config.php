<?php
return array(
	//'配置项'=>'配置值'
	'URL_ROUTER_ON'   => true, //开启路由
	'URL_MODEL'       =>  1, 

	// 模版的访问路径规则
	'TMPL_PARSE_STRING'  =>array(	
		'__PUBLIC__' => '/Public', // 更改默认的/Public 替换规则
		'__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
		'__PHOTO__'  =>  __ROOT__.'/Public/photo',
		'__Admin__'  =>  __ROOT__.'/Public/Admin',
		'__Home__'  =>   __ROOT__.'/Public/Home',
		'__PLUGIN__' =>  __ROOT__.'/Public/Plugin',
		'__JS__' =>  __ROOT__.'/Public/JS',
		'__CSS__' =>  __ROOT__.'/Public/CSS',
		'__BRAND__' => __ROOT__.'/Public/Brand',
		'__SLIDES__' => __ROOT__.'/Public/Slides',
		'__ITEMS__' => __ROOT__.'/Public/Items',
		'__FACE__' => __ROOT__.'/Public/Face',
	),


	// 数据库

		'DB_TYPE'   => 'mysqli', // 数据库类型
		'DB_HOST'   => '47.106.231.27', // 服务器地址
		'DB_NAME'   => 'SoaProject', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => 'qlk9NSAvNqq6jYEm', // 密码
		'DB_PORT'   =>  3306, // 端口
		'DB_PARAMS' =>  array(), // 数据库连接参数
		'DB_PREFIX' => 'think_', // 数据库表前缀 
		'DB_CHARSET'=> 'utf8', // 字符集
		'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志

);