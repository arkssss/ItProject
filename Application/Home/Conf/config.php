<?php
return array(
	//'配置项'=>'配置值'

	// Event Cover
	'EVENTCOVER' => array(

		'maxSize'   =>     3145728 ,// 设置附件上传大小 单位为字节
		'exts'      =>     array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
		// $upload->rootPath  =     $_SERVER['DOCUMENT_ROOT'].'/ForYiXuan/Public/Uploads/'; // 设置附件上传根目录
		'rootPath'  =>    './Public/photo/', 
		'savePath'  =>     "", // 设置附件上传（子）目录

	),

);