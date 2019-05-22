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

	'LOAD_EXT_CONFIG' => 'database',	// 隐藏数据库配置

);