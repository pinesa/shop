<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function reg()
    {
        //用户是否提交数据
        if (IS_POST) {
            //实例化模型
            $model = D('user');
            $datas = $model->create();
            if (!$datas) {
                $this->error($model->getError());
            }
            //写入数据
            $res = $model->add();
            if ($res) {
                $this->success('注册成功', U('login'));exit;
            } else {
                $this->error('注册失败!');
            }
        }
        $this->display();
    }
    //登录方法
     public function login()
    {
        //判断用户是否提交数据
        if (IS_POST) {
            $datas = I('post.');
            //查询数据库
            $model = M('user');
            $data  = $model->where(array('user_name' => $datas['username'], 'user_pwd' => md5($datas['password'])))->find();
            //用户名或者密码是否正确
            if ($data) {
                //如果用户我们要储存用户的信息
                session('uid', $data['id']);
                session('username', $data['user_name']);
                $this->success('登录成功!', U('Index/index'));exit;
            } else {
                $this->error('用户名或者密码错误!');
            }
        }
        $this->display();
    }
    //验证的展示
    //验证码
    public function verify()
    {
        //实例化验证码类 3.2 以后多特有的使用方式
        $config = array(
            'useCurve' => false,
            'useNoise' => false, // 是否添加杂点
            'fontttf'  => '4.ttf', // 验证码字体，不设置随机获取
            'fontSize' => 12, // 验证码字体大小(px)
            'imageH'   => 30, // 验证码图片高度
            'imageW'   => 100, // 验证码图片宽度
            'length'   => 4,
        );
        ob_clean();
        $verify = new \Think\Verify($config);
        //验证码的输出，文件必须是utf8 无BOM头格式文件
        $verify->entry();

    }

     public function logout()
    {
        session(null);
        if (!session('?uid')) {
            $this->success('退出成功!');
        }
    }
}