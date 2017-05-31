<?php 
namespace Admin\Controller;
use Think\Controller;
/**
* @class 后台管理主页
* @time 2017.5.28
* @author jiangsong
*/
class IndexController extends Controller
{
	/*
	*首页集合
	 */
	public function index()
	{
		$this->display();
	}
	/*
	*头部
	 */
	public function header()
	{
		$this->display();
	}
	/*
	*左边
	 */
	public function left()
	{
		$this->display();
	}
	/*
	*右边
	 */
	public function right()
	{
		$time = time();
		$login_time = session('login_time');
		$this->assign('data', array(
			'time' =>$time,
			'login_time'=>$login_time, 
			));
		$this->display();
	}
}


 ?>