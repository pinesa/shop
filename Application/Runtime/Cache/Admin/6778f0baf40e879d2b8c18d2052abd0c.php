<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <meta http-equiv=content-type content="text/html; charset=utf-8" />
    <link href="/shop/Public/Admin/css/admin.css" type="text/css" rel="stylesheet" />
    <script language=javascript>
    function expand(el) {
        childobj = document.getElementById("child" + el);

        if (childobj.style.display == 'none') {
            childobj.style.display = 'block';
        } else {
            childobj.style.display = 'none';
        }
        return;
    }
    </script>
</head>

<body>
    <table height="100%" cellspacing=0 cellpadding=0 width=170 background=/shop/Public/Admin/img/menu_bg.jpg border=0>
        <tr>
            <td valign=top align=middle>
                <table cellspacing=0 cellpadding=0 width="100%" border=0>
                    <tr>
                        <td height=10></td>
                    </tr>
                </table>
                
               
                
                
                <table cellspacing=0 cellpadding=0 width=150 border=0>
                    <tr height=22>
                        <td style="padding-left: 30px" background=/shop/Public/Admin/img/menu_bt.jpg><a class=menuparent onclick=expand(3) href="javascript:void(0);">产品中心</a></td>
                    </tr>
                    <tr height=4>
                        <td></td>
                    </tr>
                </table>
                <table id=child3 style="display: none" cellspacing=0 cellpadding=0 width=150 border=0>
                    <tr height=20>
                        <td align=middle width=30><img height=9 src="/shop/Public/Admin/img/menu_icon.gif" width=9></td>
                        <td><a class=menuchild href="<?php echo U('Brand/showlist');?>" target=right>品牌管理</a></td>
                    </tr>
                    <tr height=20>
                        <td align=middle width=30><img height=9 src="/shop/Public/Admin/img/menu_icon.gif" width=9></td>
                        <td><a class=menuchild href="<?php echo U('Goods/goods_list');?>" target=right>商品展示</a></td>
                    </tr>
                    <tr height=20>
                        <td align=middle width=30><img height=9 src="/shop/Public/Admin/img/menu_icon.gif" width=9></td>
                        <td><a class=menuchild href="<?php echo U('Attribute/attr_list');?>" target=right>商品属性</a></td>
                    </tr>
                    <tr height=20>
                        <td align=middle width=30><img height=9 src="/shop/Public/Admin/img/menu_icon.gif" width=9></td>
                        <td><a class=menuchild href="<?php echo U('Category/cate_list');?>" target=right>商品类型</a></td>
                    </tr>
                   
                    <tr height=4>
                        <td colspan=2></td>
                    </tr>
                </table>
                
                
            
                <table cellspacing=0 cellpadding=0 width=150 border=0>
                    <tr height=22>
                        <td style="padding-left: 30px" background=/shop/Public/Admin/img/menu_bt.jpg><a class=menuparent onclick=expand(7) href="javascript:void(0);">系统管理</a></td>
                    </tr>
                    <tr height=4>
                        <td></td>
                    </tr>
                </table>
                <table id=child7 style="display: none" cellspacing=0 cellpadding=0 width=150 border=0>
                    <tr height=20>
                        <td align=middle width=30><img height=9 src="/shop/Public/Admin/img/menu_icon.gif" width=9></td>
                        <td><a class=menuchild href="<?php echo U('System/menulist');?>" target=right>菜单列表</a></td>
                    </tr>
                    <tr height=20>
                        <td align=middle width=30><img height=9 src="/shop/Public/Admin/img/menu_icon.gif" width=9></td>
                        <td><a class=menuchild href="<?php echo U('System/rolelist');?>" target=right>角色列表</a></td>
                    </tr>
                    
                </table>
                <table cellspacing=0 cellpadding=0 width=150 border=0>
                    <tr height=22>
                        <td style="padding-left: 30px" background=/shop/Public/Admin/img/menu_bt.jpg><a class=menuparent onclick=expand(0) href="javascript:void(0);">个人管理</a></td>
                    </tr>
                    <tr height=4>
                        <td></td>
                    </tr>
                </table>
                <table id=child0 style="display: none" cellspacing=0 cellpadding=0 width=150 border=0>
                    <tr height=20>
                        <td align=middle width=30><img height=9 src="/shop/Public/Admin/img/menu_icon.gif" width=9></td>
                        <td><a class=menuchild href="#" target=main>修改口令</a></td>
                    </tr>
                    <tr height=20>
                        <td align=middle width=30><img height=9 src="/shop/Public/Admin/img/menu_icon.gif" width=9></td>
                        <td><a class=menuchild onclick="if (confirm('确定要退出吗？')) return true; else return false;" href="http://www.865171.cn" target=_top>退出系统</a></td>
                    </tr>
                </table>
            </td>
            <td width=1 bgcolor=#d1e6f7></td>
        </tr>
    </table>
</body>

</html>