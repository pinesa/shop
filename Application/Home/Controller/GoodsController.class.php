<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
	private $goods;
	public function _initialize()
	{
		$this->goods = M('goods');
	}


	 public function detail()
    {
        //获取商品的ID
        $id = I('id');
        //商品点击次数增加
        $model = M('goods');
        $model->where('id=' . $id)->setInc('goods_click', 1);

        $data = M('goods')->find($id);
        //商品属性展示
        $goods_attr = M()->query('SELECT b.attr_name,b.attr_val,a.id,a.goods_id,a.attr_id,a.attr_val FROM goods_attr AS a LEFT JOIN attribute AS b ON a.attr_id = b.id where b.attr_val=1 and a.goods_id=' . $id);

        foreach ($goods_attr as $key => $value) {
            $goods_attr[$key]['goods_attr_val'] = explode(',', $value['goods_attr_val']);
        }
        // dump($goods_attr);exit;
        $this->assign('goods_attr', $goods_attr);
        //商品的图片【相册】
       // $datas_pic = M('pic')->where('goods_id=' . $id)->select();
        // dump($datas_pic);exit;
        //$this->assign('datas_pic', $datas_pic);
        $this->assign('data', $data);
        $this->display();

    }



    public function showlist(){

    	$where = 'goods_status=1';


    	$goods_data = $this->goods->where('goods_status=1')->select();//获取商品数据
    	$this ->assign('goods_data',$goods_data);

    	$brand_datas = M('brand')->select();
    	$this->assign('brand_datas', $brand_datas);//获取品牌数据
        $this->display();
    }
}