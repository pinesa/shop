<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title></title>
</head>
<body>
	/Public  <br>
	Public/Home  <br>
	/index.php/Admin/Index/test  <br>
	/index.php/Admin/Index<br>  
	/admin/index/test  <br>

	<?php echo (substr((isset($str) && ($str !== ""))?($str):"这家伙很懒",0,12)); ?>

</body>
</html>