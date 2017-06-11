<?php 
namespace Admin\Controller;
use Think\Controller;
/**
* @fun 商品属性维护
* @time 2017/6/6 2:29
* @author  jiangsong
* @param
* @return
*/
class CategoryController extends Controller
{
	
	public function _initialize()
	{
		$this->Category = D('Category');
	}

	public function cate_add()
	{
		$attr_data = $this->Category->select();
		
		if (IS_POST) {
			$data = I('post.');
			$res = $this->Category->add($data);
			if ($res) {
				$this->success('添加成功',U('cate_list'));exit;
			}else{
				$this->error('添加失败');
			}
		}
		$this->display();
	}

	public function cate_list()
	{
		$cate_data = $this->Category->select();
		
		$this->assign('cate_data',$cate_data);
		$this->display();
	}
}

 ?>