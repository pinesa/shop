<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	if (IS_POST) {
    		if (1) {
    			$this->success('登录成功',U('Index/index'));die;
    		}else{
    			$this->error('账号或密码输入不正确',U('login'));
    		}
    	}
    	$this->display();  
    }

}