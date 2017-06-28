<?php 
namespace Admin\Controller;
use Think\Controller;
/**
* @fun 商品属性维护
* @time 2017/6/6 2:29
* @author  jiangsong
* @param
* @return
*/
class AttributeController extends Controller
{
	
	public function _initialize()
	{
		$this->attribute = D('attribute');
	}

	public function attr_add()
	{
		$attr_data = $this->attribute->select();
		
		 if (IS_POST) {
            //实例化模型
            $model = M('Attribute');
            $datas = $model->create();
            //将中文逗号切换成英文
            $datas['attr_val'] = str_replace('，', ',', $datas['attr_val']);
            p($datas);
            $res               = $model->add($datas);
            if ($res) {
                $this->success('操作成功!', U('attr_list'));exit;
            } else {
                $this->error('操作失败!');
            }

        }
        $this->assign('cate_data', M('category')->select());
		$this->display();
	}
//属性列表
	public function attr_list()
	{
		$attr_data = M('attribute')->alias('a')->join('LEFT JOIN category AS b ON a.cate_id = b.id')->field("a.id,a.attr_name,a.cate_id,a.attr_inp,a.attr_type,a.attr_val,b.category_name")->order('id')->select();
		
		$this->assign('attr_data',$attr_data);
		$this->display();
	}

	public function getAttr(){
		//$cate_id = $_POST['cate_id'];
		$id = $_POST['cate_id'];
		$arr  = array('username' =>'jss');
		$data = M('attribute')->where('cate_id='.$id)->select();
		echo json_encode($data);die;  //把数组转成json格式的字符串返回 	
	}
}

 ?>