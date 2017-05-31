<?php
/*
*@fun 打印变量
* @author js
* @time 2017.5.29
 */ 
function p($param)
{
	if ($param=='') {
		echo "变量不得为空";die;
	}else{
		echo "<pre>";
		var_dump($param);die;
		echo "</pre>";
	}
	
}

 ?>