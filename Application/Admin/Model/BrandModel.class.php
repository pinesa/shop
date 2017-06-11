<?php 
namespace Admin\Model;
use Think\Model;
/**
* @fun 品牌数据模型
* @author js
* @time 2017/6/1
* @param 
* @return
*/
class BrandModel extends Model
{
	/*
	*@var自动验证
	 */
	protected $_validate = array(
		  array('brand_name','require','品牌名称不能为空'),
		  array('brand_sort','require','排序不能为空'),
		);

	//封装获取品牌表数据
	public function getData()
	{
		$data = $this->where("brand_status = 1")->select();
		return $data;
	}
}


 ?>