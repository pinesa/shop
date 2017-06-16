<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){ 

    	$ip = get_client_ip();
    	
    	//实例化物理定位方法
    	$location = new \Org\Net\IpLocation('qqwry.dat');
    	
    	$address = $location->getlocation('101.81.190.127');  //调用location方法传入$id参数
    	$str = $address['country'];
    	$str = iconv('GB2312','UTF-8',$str );  //改变字符编码
    	
         $this->assign('str',$str);
        $this->display();
    }

    

}