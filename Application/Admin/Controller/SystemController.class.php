<?php 
namespace Admin\Controller;
use Think\Controller;
/**
* @fun 权限管理页面
* @time 2017/6/4
* @author jiangsong
* @param
* @return
*/
class SystemController extends Controller
{
	private $menu;
	private $role;
	private $access;
	public function __construct()
	{
		parent::__construct();
		$this->menu = D('menu');
		$this->role = D('role');
		$this->access = D('access');
	}
	//获取菜单权限数据列表
	public function menulist()
	{
		$menu_data = $this->menu->select();
		$this->assign('menu_data',$menu_data);
		$this->display();
	}
	//权限菜单添加
	public function menuadd()
	{
		$menu_data = $this->menu->select();
		$menu_data = getTree($menu_data);
		if (IS_POST) {
			$data = I('post.');
			$res = $this->menu->add($data);
			if ($res) {
				$this->success('添加成功',U('menulist'));exit;
			}else{
				$this->error('添加失败',U('menuadd'));
			}
		}
		$this->assign('menu_data',$menu_data);
		$this->display();
	}

	//获取角色列表
	public function rolelist()
	{
		$role_data = $this->role->select();
		$this->assign('role_data',$role_data);
		$this->display();
	}

	//角色添加
	public function roleadd()
	{
		$menu_data = $this->role->select();
		$menu_data = getTree($menu_data);
		if (IS_POST) {
			$data = I('post.');
			$res = $this->menu->add($data);
			if ($res) {
				$this->success('添加成功',U('menulist'));exit;
			}else{
				$this->error('添加失败',U('menuadd'));
			}
		}
		$this->assign('menu_data',$menu_data);
		$this->display();
	}
	//当前用户权限列表
	public function accesslist($id)
	{
		//获取当前角色
		$role_data = $this->role->find($id);
		//获取所有权限数据(树级数据)
		$menu_data = list_to_tree($this->menu->select());
		//获取当前角色对应权限id(对应关系数据)
		$access_data = $this->access->field('menu_id')->where("role_id=".$id)->select();
		$access_data = array_column($access_data, 'menu_id');
		//p($access_data);
		$this->assign('access_data',$access_data);
		$this->assign('menu_data',$menu_data);
		$this->assign('role_data',$role_data);
		$this->display();
	}
	//分配用户权限
	public function access_edit()
	{
		if (IS_POST) {
			$data = I('post.');
			foreach ($data['menu']  as $key => $value) {
				$datas[$key]['role_id'] = $data['role_id'];
				$datas[$key]['menu_id'] = $value;
			}
			//p($data);
			$this->access->where("role_id=".$data['role_id'])->delete();
			$res = $this->access->addAll($datas);
			//echo  $this->access->_sql();die;
			if ($res) {
				$this->success('权限添加成功',U('System/rolelist'));die;
			}else{
				$this->error("添加失败");
			}
		}
	}
	
}

 ?>