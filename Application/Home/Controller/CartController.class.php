<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    public function showlist(){
    	if (session('?uid')) {

            $cart_datas = M('cart')->where('user_id=' . session('uid'))->select();
            //数据获取
            foreach ($cart_datas as $key => $value) {

                $goods_data = M('goods')->find($value['goods_id']);

                $cart_datas[$key]['goods_name']     = $goods_data['goods_name'];
                $cart_datas[$key]['goods_mprice']   = $goods_data['goods_mprice'];
                $cart_datas[$key]['brand_smallpic'] = $goods_data['brand_smallpic'];
                $cart_datas[$key]['subtotal']       = $value['number'] * $value['goods_price'];
                $cart_datas[$key]['goods_attr']     = json_decode($value['goods_attr'], true);
            }

        }
        $this->assign('cart_datas', $cart_datas);
    	$this->display();
    }

    public function add(){
    	$cat_data = I('post.');
    	if(session('?uid')){
			 $cat_data['goods_attr'] = json_encode($cat_data['goods_attr']);
            $cat_data['user_id']    = session('uid');
            $model              = M('cart');
            $where              = array('goods_id' => $cat_data['goods_id'], 'user_id' => session('uid'));
            $cart_data          = $model->where($where)->find();
            //echo  $model->_sql();die;
            if ($cart_data) {
                //存在number自动增加
                $model->where($where)->setInc('number', 1);
            } else {
                //不存在就增加操作
                $model->add($cat_data);
            }
    	}else{
    		echo "存进cookie";
    	}

    	$this->redirect('showList');
    }
}