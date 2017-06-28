<?php 
/**
* @fun 订单模块
* @time 2017/6/21 10:10
* @author  jiangsong
* @param
* @return
*/
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller
{
	//购买订单确认页面
	public function buy()
	{

		$goods_id = I('post.goods_id');
		
		$data = M('goods')->find($goods_id);  //商品数据

		$goods_attr = M('goods_attr')->alias('a')->field('a.attr_id,a.attr_val')->where('goods_id='.$goods_id)->select();  //属性数据
		p($goods_attr);

		$user_id = session('uid');
		$lo_datas = M('location')->where('user_id='.$user_id)->select();//地址数据
		$this->assign('data',$data);
		$this->assign('goods_attr',$goods_attr);
		$this->assign('lo_datas',$lo_datas);
		$this->display();
	}
}


 ?>