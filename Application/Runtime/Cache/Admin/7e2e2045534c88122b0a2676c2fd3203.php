<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <meta http-equiv=content-type content="text/html; charset=utf-8" />
    <link href="/shop/Public/Admin/css/admin.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <table cellspacing=0 cellpadding=0 width="100%" align=center border=0>
        <tr height=28>
            <td background=/shop/Public/Admin/img/title_bg1.jpg>当前位置: </td>
        </tr>
        <tr>
            <td bgcolor=#b1ceef height=1></td>
        </tr>
        <tr height=20>
            <td background=/shop/Public/Admin/img/shadow_bg.jpg></td>
        </tr>
    </table>
    <table cellspacing=0 cellpadding=0 width="90%" align=center border=0>
        <tr height=100>
            <td align=middle width=100><img height=100 src="/shop/Public/Admin/img/admin_p.gif" width=90></td>
            <td width=60>&nbsp;</td>
            <td>
                <table height=100 cellspacing=0 cellpadding=0 width="100%" border=0>
                    <tr>
                        <td>当前时间：<?php echo (date("Y/m/d H:i:s",$data["time"])); ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; font-size: 16px"><?php echo ($_SESSION['data']['username']); ?></td>
                    </tr>
                    <tr>
                        <td>欢迎进入网站管理中心！</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=3 height=10></td>
        </tr>
    </table>
    <table cellspacing=0 cellpadding=0 width="95%" align=center border=0>
        <tr height=20>
            <td></td>
        </tr>
        <tr height=22>
            <td style="padding-left: 20px; font-weight: bold; color: #ffffff" align=middle background=/shop/Public/Admin/img/title_bg2.jpg>您的相关信息</td>
        </tr>
        <tr bgcolor=#ecf4fc height=12>
            <td></td>
        </tr>
        <tr height=20>
            <td></td>
        </tr>
    </table>
    <table cellspacing=0 cellpadding=2 width="95%" align=center border=0>
        <tr>
            <td align=right width=100>登陆帐号：</td>
            <td style="color: #880000"><?php echo ($_SESSION['data']['username']); ?></td>
        </tr>
        <tr>
            <td align=right>真实姓名：</td>
            <td style="color: #880000"><?php echo ($_SESSION['data']['truename']); ?></td>
        </tr>
        <tr>
            <td align=right>注册时间：</td>
            <td style="color: #880000"><?php echo ($_SESSION['data']['add_time']); ?></td>
        </tr>
        <tr>
            <td align=right>登陆次数：</td>
            <td style="color: #880000"><?php echo ($_SESSION['data']['login_count']); ?></td>
        </tr>
        <tr>
            <td align=right>上线时间：</td>
            <td style="color: #880000"><?php echo (date("H:i:s",$data["login_time"])); ?></td>
        </tr>
        <tr>
            <td align=right>ip地址：</td>
            <td style="color: #880000"><?php echo (session('ip_address')); ?></td>
        </tr>
        <tr>
            <td align=right>身份过期：</td>
            <td style="color: #880000">30 分钟</td>
        </tr>
    </table>
</body>

</html>