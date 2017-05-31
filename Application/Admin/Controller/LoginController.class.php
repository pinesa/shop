<?php
namespace Admin\Controller;
use Think\Controller;
/*
*@var 登录注册模块
*@author js
*@time 2017.5.31 
 */
class LoginController extends Controller {
    /*
    *保存表用户表模型
     */
    public function __construct()
    {
        parent::__construct();
        $this->admin = M('admin');
    }
    /*
    *登录方法
     */
    public function login(){
    	if (IS_POST) {
            $username = I('post.admin_user');
            $pwd = I('post.admin_psd');
            $code = I('post.captcha');
            //验证码判断
            $verify = new \Think\Verify();
            if (!$verify->check($code)) {
                $this->error('验证码输入错误',U('login'));
            }
            $data=$this->admin->where("username='$username' AND password='$pwd'")->find();
    		if($data){
                $data['login_count'] = $data['login_count']+1;
                $this->admin->where("username='$username' AND password='$pwd'")->save($data);
                session('data',$data);
                session('login_time',time());
                session('ip_address',$_SERVER['REMOTE_ADDR']);    
    			$this->success('登录成功',U('Index/index'));die;
    		}else{
    			$this->error('账号或密码输入不正确',U('login'));
    		}
    	}
    	$this->display();  
    }
   
   /*
   *验证码方法
    */
   public function verify(){
     $config = array(
        'useCurve'  =>  false,            // 是否画混淆曲线
        'useNoise'  =>  false,            // 是否添加杂点
        'length'    =>  4,                // 验证码位数
        );
    $verify = new \Think\Verify($config);
    $verify->entry();
   }

}