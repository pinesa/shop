<?php 
namespace Admin\Model;
use Think\Model;
/**
* @fun 用户权限数据模型
* @param
* @return
*/
class SystemModel extends Model
{
	
	public function getMenuData()
	{
		$menudata = $this->select();
		return $menudata;
	}
}

 ?>