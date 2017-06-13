<?php

//命名空间
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{

    protected $_validate = array(
        //用户明不能为空
        array('user_name', 'require', '用户名不能为空!'),
        array('user_pwd', 'require', '密码不能为空!'),
        array('user_pwd2', 'user_pwd', '两次输入密码不一致!', 0, 'confirm'),
        array('user_email', 'email', '邮箱格式不正确!'),

    ); // 自动验证定义

    //数据库写入之间调用的方法
    protected function _before_insert(&$datas, $options)
    {
        //写过程代码
        $datas['user_addtime'] = time();
        $datas['user_pwd']     = md5($datas['user_pwd']);
    }

}
