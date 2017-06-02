<?php 
namespace Admin\Controller;
use Think\Controller;
/**
* @fun 商品模块 增加，下架，修改
* @time 2017/6/1 20:33 
* @author jiangsong
* @param
* @return
*/
class GoodsController extends Controller
{
	//变量good保存实例化模型
	protected $goods;
	public function __construct()
	{
		parent::__construct();
		$this->goods = M('goods');
	}
	//商品显示列表
	public function goods_list()
	{
		
		//分页设置
		$count = $this->goods->count();
		$listRows = 5;
		$page = new \Think\Page($count,$listRows);
		//获取数据
		$data = $this->goods->alias('a')->field('a.*,b.brand_name')->join("left join brand b on a.brand_id=b.id")->where('goods_status=1')->limit($page->firstRow,$page->listRows)->select();
		//修改分页样式
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page = $page->show();
		//传数据到模板
		$this->assign('data',$data);
		$this->assign('page',$page);
		$this->display();
	}
	//商品添加
	public function goods_add(){
		if (IS_POST) {

			//上传图片功能
			if ($_FILES['goods_image']['name']!='') {
				 $config = array(
		        'maxSize'       =>  2*1024*1024, //上传的文件大小限制 (0-不做限制)
		        'rootPath'      =>  './Uploads/', //保存根路径
    			);
				$image = new \Think\Upload($config);  //实例化上传图片类
				$info = $image->upload();  //调用上传方法
				//p($info);
				if (!$info) {
					$this->error($upload->getError());  //获取错误信息
				}
			}


			//制作缩略图
			$images = new \Think\Image();
			//第一步打开图片
			echo UPLOAD.$info['goods_image']['savepath'].$info['goods_image']['savename'];
			$images->open(UPLOAD.$info['goods_image']['savepath'].$info['goods_image']['savename']);  
			//第二步thumb()裁剪  
			$images->thumb(50,50)->save(UPLOAD.$info['goods_image']['savepath'].'thumb'.$info['goods_image']['savename']);


			//获取添加商品信息写入数据库
			$data = I('post.');
			//保存大图路径
			$data['brand_bigpic'] = $info['goods_image']['savepath'].'/'.$info['goods_image']['savename'];
			//保存缩略图路径
			$data['brand_smallpic'] = $info['goods_image']['savepath'].'/'.'thumb'.$info['goods_image']['savename'];
			 //写入添加时间
			$data['goods_add_time'] = time();
			$goods = D('goods');
			if (!$goods->create()) {
				$this->error($goods->getError());
			}
			$res = $this->goods->add($data);
			if ($res) {
				$this->success('添加成功',U('goods_list'),3);die;
			}else{
				$this->error('添加失败');
			}
		}
		//获取brand_data数据
		$brand_data = M('brand')->select();
		$arr = array('brand_data' => $brand_data, );
		//传入数据
		$this->assign('data', $arr);
		$this->display();
	}
	//商品下架操作
	public function del()
	{
		
	}
}


 ?>