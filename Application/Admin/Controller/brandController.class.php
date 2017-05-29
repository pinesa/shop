<?php
namespace Admin\Controller;
use Think\Controller; 
/**
* @var 产品模块
* @author jiangsong
* @param 2017/5/28
*/
class BrandController extends Controller
{
	/*
	*实例化brand模型
	 */
	private $brand;
	public function __construct()
	{
		parent::__construct();
		$this->brand = M('brand');
	}
	/*
	*@fun列表显示 
	*
	 */
	public function showList()
	{
		$data = $this->brand->select();
		$this->assign('data',$data);
		$this->display();
	}
	/*
	*@fun修改功能
	 */
	public function add()
	{
		if (IS_POST) {
			$data = I('post.');
			$res = $this->brand->add($data);
			if ($res) {
				$this->success('添加成功',U('showList'));die;
			}else{
				$this->error('添加失败');
			}
		}
		$this->display();
	}

	/*
	*修改功能
	 */
	public function edit($id)
	{
		$data = $this->brand->find($id);
		if (IS_POST) {
			$data = I("post.");
			$id = $data['id'];
				if ($this->brand->where("id=$id")->save($data)) {
					$this->success("修改成功",U('showList'));die;
				}else{
					$this->error('修改失败');
				}
			}
		
		$this->assign('data',$data);
		$this->display();
	}
	/*
	*删除功能
	 */
	public function del($id)
	{
		if ($this->brand->delete($id)) {
			$this->success("删除成功",U("showList"));die;
		}else{
			$this->error("修改失败");
		}
	}
}
	


 ?>