<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="/shop/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('goods_add');?>">【添加商品】</a>
                </span>
            </span>
        </div>
        <div></div>
        
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>商品名称</td>
                         <td>分类</td>
                         <td>品牌</td>
                        <td>库存</td>
                        <td>价格</td>
                        <td>缩略图</td>
                        <td>创建时间</td>
                        <td align="center" style="text-align: center;" colspan="2">操作</td>
                    </tr>
                    <?php if(is_array($data)): foreach($data as $key=>$brand_data): ?><tr id="product1">
                        <td><?php echo ($brand_data['id']); ?></td>
                        <td><a href="#"><?php echo ($brand_data['goods_name']); ?></a></td>
                        <td>100</td>
                        <td><?php echo ($brand_data['brand_name']); ?></td>
                        <td><?php echo ($brand_data['goods_count']); ?></td>
                        <td><?php echo ($brand_data['goods_price']); ?></td>
                        <td><img src="/shop/Uploads/<?php echo ($brand_data['brand_smallpic']); ?>" height="40" width="40"></td>
                        <td><?php echo (date("Y/m/d H:i:s",$brand_data['goods_add_time'])); ?></td>
                        <td><a href="#">修改</a></td>
                        <td><a href="javascript:;" class="goods_del" id="<?php echo ($brand_data['id']); ?>">下架</a></td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($page); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
    <script type="text/javascript" src="/shop/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
       $(function(){
        $('.goods_del').click(function(){
            id = $(this).attr('id');  //获取到点击的id
            $.ajax({   //以json形式传id到后台
                url: '',
                type: 'POST',
                dataType: 'json',
                data: {'id': id},
                success:function(data) {
                    console.log(data);
                }
            })
        })
       })
        
    </script>
</html>