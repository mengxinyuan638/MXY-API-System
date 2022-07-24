<?php
include('./key.php');
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#fd4b5c">
<title><?php echo $mz; ?>API</title>
</head>
<style type="text/css">
h3:hover {box-shadow:0px 0px 8px #D1D1D1;}
</style>
<div style="box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);border-radius:15px;font-size:13px;width:950px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:0px solid #eee;max-width:100%;">
<div style="width:100%;background-color: #3174ed;background-image: linear-gradient(90deg, #3174ed 0%, #FA8BFF 35%, #3fd9fb 88%);color:#FFFFFF;border-radius:15px 15px 0 0;">
<h2 style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;text-align:center">
窥屏接口
</h2>
</div>
<div style="margin:0px auto;width:90%">
<h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
窥屏接口API请求方式
<ul>
<li>GET</li>
</ul>
<hr>
请求地址：<br/>
<a style="color:#fd4b5c;text-decoration:none;">
<?php echo $key; ?>/api/kp/kp.php
</a><br/>
参数：<br/>
<li>a (必选)
</li>
备注：<br/>
暂无<br/>
<hr>
示例：<br/>
<a style="color:#fd4b5c;text-decoration:none；" href="" target="_blank">
<?php echo $key; ?>/api/kp/kp.php?a=%群号%b666</a>\n
<a style="color:#fd4b5c;text-decoration:none；" href="" target="_blank">
<?php echo $key; ?>/api/kp/%群号%/666.txt</a>\n
</a>
<hr>
<br/>
<pre class="layui-code"></pre>

QRS等用法<br/><br/>
<body><textarea id="text" style="width:100%;background-color:#CDCDCD;background-image:linear-gradient(90deg,#6694ed 0%,);color:#FF0000;border-radius:5px" rows="15" >
谁在窥屏|窥屏检测|谁在窥屏？|窥屏检测?
卡:%随机数0-10000%
json:{"app":"com.tencent.miniapp_01","desc":"","view":"view_8C8E89B49BE609866298ADDFF2DBABA4","ver":"1.0.0.19","prompt":"[QQ小程序]QQ超级会员","meta":{"detail_1":{"appid":"1108809550","title":"窥屏检测","desc":"窥屏检测","icon":"<?php echo $key; ?>/api/kp/kp.php?a=%群号%b%卡%","preview":"<?php echo $key; ?>/api/kp/kp.php?a=%群号%b%卡%?pt=3&amp;ek=1&amp;kp=1&amp;sce=70-0-0","url":"<?php echo $key; ?>/api/kp/kp.php?a=%群号%b%卡%","scene":0,"host":{"uin":1278762497,"nick":""},"shareTemplateId":"8C8E89B49BE609866298ADDFF2DBABA4","shareTemplateData":{}}},"config":{"type":"normal","width":0,"height":0,"forward":1,"autoSize":0}}
$写 窥屏/%群号% 1 %卡%$
$调用 10000 2$

2
A:$读 窥屏/%群号% 1 0$
B:$访问 <?php echo $key; ?>/api/kp/%群号%/%A%.txt$
有以下小伙伴在窥屏\n%B%
</textarea><button id="copy" style="width:100%;background-color:#FFFFFF;background-image:linear-gradient(90deg,#6694ed 0%,);color:#000000;border-radius:5px" onclick=copy()>点我复制</button>
</body>
</html>
<script>
function copy()
{
var text=document.getElementById("text");
var copy=document.getElementById("copy");
text.select();
document.execCommand("copy");
copy.focus();
alert("复制完成")
}
</script>
<br/>
<hr>
<pre class="layui-code"></pre>

medic用法<br/><br/>
<body><textarea id="text" style="width:100%;background-color:#CDCDCD;background-image:linear-gradient(90deg,#6694ed 0%,);color:#FF0000;border-radius:5px" rows="15" >
谁在窥屏|窥屏检测|谁在窥屏？|窥屏检测?
卡:ToolKit->random(0\,10000)
Api->sendMsg({"app":"com.tencent.miniapp_01","desc":"","view":"view_8C8E89B49BE609866298ADDFF2DBABA4","ver":"1.0.0.19","prompt":"[QQ小程序]QQ超级会员","meta":{"detail_1":{"appid":"1108809550","title":"窥屏检测","desc":"窥屏检测","icon":"<?php echo $key; ?>/api/kp/kp.php?a=@groupb@卡","preview":"<?php echo $key; ?>/api/kp/kp.php?a=@groupb@卡?pt=3&amp;ek=1&amp;kp=1&amp;sce=70-0-0","url":"<?php echo $key; ?>/api/kp/kp.php?a=@groupb@卡","scene":0,"host":{"uin":1278762497,"nick":""},"shareTemplateId":"8C8E89B49BE609866298ADDFF2DBABA4","shareTemplateData":{}}},"config":{"type":"normal","width":0,"height":0,"forward":1,"autoSize":0}})
Api->send()
ToolKit->sleep(10000)
C:ToolKit->access(<?php echo $key; ?>/api/kp/@group/@卡.txt)
Api->addText(有以下小伙伴在窥屏\n@C)
Api->send()
</textarea><button id="copy" style="width:100%;background-color:#FFFFFF;background-image:linear-gradient(90deg,#6694ed 0%,);color:#000000;border-radius:5px" onclick=copy()>点我复制</button>
</body>
</html>
<script>
function copy()
{
var text=document.getElementById("text");
var copy=document.getElementById("copy");
text.select();
document.execCommand("copy");
copy.focus();
alert("复制完成")
}
</script>
<br/>
<hr>
</h3>
</div>
<hr>
</div>
</div>
</html>