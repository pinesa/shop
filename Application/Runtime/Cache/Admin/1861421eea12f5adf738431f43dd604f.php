<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>权限列表</title>
    <link href="/shop/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    <script src="/shop/Public/Admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
</head>

<body>
    <style>
    .tr_color {
        background-color: #9F88FF
    }
    </style>
    <div class="div_head">
        <span>
                <span style="float: left;">当前位置是：角色管理-》权限列表</span>
        <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('role_list');?>">【返回角色管理】</a>
                </span>
        </span>
    </div>
    <div></div>
    <div style="font-size: 13px; margin: 10px 5px;">
        <form action="<?php echo U('access_edit');?>" method="post" name='access'>
        <input type="hidden" name="role_id" value="<?php echo ($_GET['id']); ?>">
            <table id="menu_list" class="table_a" border="1" width="100%">
                <tbody>
                    <tr>
                        <td>当前角色：</td>
                        <td colspan="2">
                            <?php echo ($role_data["role_name"]); ?>
                        </td>
                    </tr>
                    <?php if(is_array($menu_data)): foreach($menu_data as $key=>$d): ?><tr>
                            <td>
                                <input <?php if(in_array($d[id],$access_data)): ?>checked<?php endif; ?> class="checkpart" value="<?php echo ($d["id"]); ?>" data-id="<?php echo ($d["id"]); ?>" name="menu[]" type="checkbox" /><?php echo ($d["menu_name"]); ?></td>
                            <?php if(is_array($d[_child])): foreach($d[_child] as $key=>$dd): ?><td id="checkbox_<?php echo ($d[id]); ?>">
                                    <div style="width:100px;float:left;">
                                        <input <?php if(in_array($dd[id],$access_data)): ?>checked<?php endif; ?> class="checkpart" value="<?php echo ($dd["id"]); ?>" data-id="<?php echo ($dd["id"]); ?>" name="menu[]" type="checkbox" /><?php echo ($dd["menu_name"]); ?></div>
                                </td><?php endforeach; endif; ?>
                        </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <table class="table_a" border="1" width="100%">
                <tbody>
                    <tr>
                        <td style="text-align: center;">
                            <input class="checkall" type="checkbox" /> 全选/反选</td>
                        <td>
                            <input type="submit" value="提交" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
<script type="text/javascript">
$(function(){
    $('.checkall').click(function() {
        $('#menu_list :checkbox').each(function() {
            $(this).attr('checked', !$(this).attr('checked'));
        });

    })

     $('.checkpart').click(function(){
                //获取是点击的哪一个父类菜单
                id = $(this).attr('data-id');
                $("#checkbox_"+id+" :checkbox").each(function(){
                     $(this).attr('checked',!$(this).attr('checked'));
                })
            })
})
</script>

</html>