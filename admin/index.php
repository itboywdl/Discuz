<?php

//这个是如果它不存在就会弹出对话框，然后跳转到login.html
if(!isset($_COOKIE['uid'])){
	echo '<script>alert("请您先登录，再访问好吗!");window.location.href="login.html";</script>';
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>网站后台管理系统</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="css/css.css" type="text/css" rel="stylesheet" />
</head>
<!--框架样式-->
<frameset rows="95,*,30" cols="*" frameborder="no" border="0" framespacing="0">
<!--top样式-->
	<frame src="top.html" name="topframe" scrolling="no" noresize id="topframe" title="topframe" />
<!--contact样式-->
	<frameset id="attachucp" framespacing="0" border="0" frameborder="no" cols="194,12,*" rows="*">
		<frame scrolling="auto" noresize="" frameborder="no" name="leftFrame" src="left.html"></frame>
		<frame id="leftbar" scrolling="no" noresize="" name="switchFrame" src="swich.html"></frame>
		<frame scrolling="auto" noresize="" border="0" name="mainFrame" src="main.html"></frame>
	</frameset>
<!--bottom样式-->
	<frame src="bottom.html" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
	<noframes></noframes>
</frameset>
<!--不可以删除-->
</html>