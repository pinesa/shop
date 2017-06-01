<?php 
namespace Admin\Model;
use Think\Model;
/**
* @var 品牌数据模型
* @author js
* @time 2017/6/1
*/
class BrandModel extends Model
{
	protected $_validate = array(
		  array('brand_name','require','品牌名称不能为空'),
		  array('brand_sort','require','排序不能为空'),
		  array('brand_sort','regexp','排序不能为空'),
		);
}


 ?>