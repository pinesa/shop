<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <title>添加商品</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/shop/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
    <link href="/shop/Public/Admin/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
     <script type="text/javascript" src="/shop/Public/Admin/umeditor/third-party/jquery.min.js"></script> 
    <script type="text/javascript" src="/shop/Public/Admin/umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/shop/Public/Admin/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/shop/Public/Admin/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/shop/Public/Admin/umeditor/lang/zh-cn/zh-cn.js"></script>

    <script type="text/javascript" src="/shop/Public/Admin/js/jquery-1.7.2.min.js"></script>
</head>

<body>
    <div class="div_head">
        <span>
                <span style="float:left">当前位置是：商品管理-》添加商品信息</span>
        <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./admin.php?c=goods&a=showlist">【返回】</a>
                </span>
        </span>
    </div>
    <div></div>
    <div style="font-size: 13px;margin: 10px 5px">
        <form action="<?php echo U('goods_add' );?>" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td>
                        <input type="text" name="goods_name" />
                    </td>
                </tr>
                <tr>
                    <td>商品品牌</td>
                    <td>
                        <select name="brand_id">
                            <option value="0">请选择</option>
                            <?php if(is_array($brand_data)): foreach($brand_data as $k=>$list): ?><option value="<?php echo ($list["id"]); ?>"><?php echo ($list["brand_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品类型</td>
                    <td>
                        <select name="cate_id" class="goods_cate">
                            <option value="0">请选择</option>
                            <?php if(is_array($cate_data)): foreach($cate_data as $key=>$list): ?><option value="<?php echo ($list["id"]); ?>"><?php echo ($list["category_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td>
                        <input type="text" name="goods_price" />
                    </td>
                </tr>
                <tr>
                    <td>商品图片</td>
                    <td>
                        <input type="file" name="goods_image" />
                    </td>
                </tr>
                <tr>
                    <td>商品数量</td>
                    <td>
                        <input type="text" name="goods_count" />
                    </td>
                </tr>
                <tr>
                    <td>商品排序</td>
                    <td>
                        <input type="text" name="goods_sort" />
                    </td>
                </tr>
                <tr>
                    <td>商品详细描述</td>
                    <td>
                        <script type="text/plain" name="goods_description" id="myEditor" style="width:800px;height:240px;"></script>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<script type="text/javascript">
//实例化编辑器
var um = UM.getEditor('myEditor');

$(function() {
    $('.goods_cate').change(function() {
        _this = $(this);
        cate_id = $(this).val();
        $('.tr1').remove();
        //console.log(cate_id);
        $.post('<?php echo U("Attribute/getAttr");?>', {
            cate_id: cate_id
        }, function(datas) {
            //返回一个对象数组
            var str = ""; //拼接选择条件控件

            //console.log(datas);
            $.each(datas, function(index, val) {
                var options = '';
                if (val.attr_inp == 0) {
                    //是输入框拼接条件
                    str = '<tr class="tr1"><td>' + val.attr_name + '</td><td><input name="goods_attr[' + val.id + '][]" type="text"></td></tr>';
                } else {
                    //是下拉框的情况
                    //把val.attr_val的值拆分成数组,合成option的值遍历出来
                    console.log(val.attr_val);
                    tmp = val.attr_val.split(','); //字符串.split(',')用,拆分
                    //console.log(tmp.length);
                    for (var i = 0; i < tmp.length; i++) {
                        options += '<option value = ' + tmp[i] + '>' + tmp[i] + '</option>'
                    }
                    console.log(options);
                    str = '<tr class="tr1"><td>' + val.attr_name + '</td><td><select name="goods_attr[' + val.id + '][]">' + options + '</select><a href="javascript:void(0);"  class="add_attr"> + </a></td></tr>';
                }
                _this.parents('tr').after(str);
            });

        }, 'json');

    })

    $('.add_attr').live('click', function() {
            trDom = $(this).parents('tr');
            //克隆出来的对象
            domclone = trDom.clone();
            //找到加号的a标签
            domclone.find('a').remove();
            // 自定义a标签的内容
            a = '<a href="javascript:void(0);"  class="mus_attr"> - </a>';
            //将内容追加到克隆对象里面去
            domclone.find('select').after(a);

            trDom.after(domclone);

        })
        //删除属性项
    $('.mus_attr').live('click', function() {
        $(this).parents('tr').remove();
    })

})
</script>

</html>