<?php 
namespace Admin\Controller;
use Think\Controller;
/**
* @fun 基础控制器防翻墙
* @time 2017/6/4 19:52
* @author jiangsong
* @param
* @return 
*/
class BaseController extends Controller
{
	//防登录翻墙机制
	public function __construct()
	{
		parent::__construct();
		if (!session('?username')) {
			$this->error('非法登录，请输入账号密码',U('Login/login'));
		}
		//放权限翻墙
		if (session('username')!='admin') {
			$datas = M('access')->alias('a')->join('LEFT JOIN menu  b on a.menu_id = b.id')->where( array('b.pid' => array('neq', 0),'a.role_id'=>session('rid')))->select();
		 //拼接当前url
		$access_controller = CONTROLLER_NAME;
		$access_action = ACTION_NAME;
		$access_url = strtolower($access_controller.$access_action);

		//允许访问的url
			foreach ($datas as $key => $value) {
				$data_url[] =strtolower($value['menu_controller'].$value['menu_action']); 
			}
			$data_url[] = 'indexheader';
			$data_url[] = 'indexright';
			$data_url[] = 'indexleft';
			/*var_dump($access_url);
			var_dump($data_url);die;*/
			if (!in_array($access_url,$data_url)) {
				$this->error('无权限访问');die;
			}
		}
	}
}

 ?>