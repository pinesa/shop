<?php
/**
* @fun 打印变量
* @author js
* @time 2017.5.29
* @param $str
* @return
*/ 
function p($str)
{
	if ($str=='') {
		echo "变量不得为空";die;
	}else{
		echo "<pre>";
		print_r($str);die;
		echo "</pre>";
	}
	
}

/**
* @fun tp引入htmlPurifer第三方类 过滤script标签
* @author jiangssong
* @time 2017.5.29
* @param $str 要过滤的字符串
* @return $clean_str 过滤后的字符串
*/ 
function htmlPurifier($str)
{
	Vendor('htmlPurifier.library.HTMLPurifier#auto');
	$config = HTMLPurifier_Config::createDefault();
	$purifier = new HTMLPurifier($config);
	$clean_str = $purifier->purify($str);
	return $clean_str;
}




/**
* @fun 数据字典
* @author jiangsong
* @time 2017.5.29
* @param $value 处理格式的参数
* @return $status 返回转换后的格式
*/ 
function getStatus($value=1)
{
	if ($value==1) {
		$status = '是';
	}else{
		$status = '否';
	}
	return $status;
}
 ?>

