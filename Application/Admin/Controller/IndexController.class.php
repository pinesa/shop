<?php 
namespace Admin\Controller;
use Think\Controller;
/**
* @fun index 后台管理主页
* @time 2017/5/28
* @author jiangsong
* @param
* @return
*/
class IndexController extends BaseController
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

	 public function verify(){
     $config = array(
        'useCurve'  =>  true,            // 是否画混淆曲线
        'useNoise'  =>  true,            // 是否添加杂点  
        'length'    =>  4               // 验证码位数
        );
    $verify = new \Think\Verify($config);
    ob_clean();
    $verify->entry();
   }
}


 ?>