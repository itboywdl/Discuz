<?php
//引用数据库文件
include './public/conf/const.php';
//引用数据的连接
include './public/conn.php';
//var_dump($link);

//这个获取login.html中用户名
$username=$_POST['username'];
//这个获取login.html中密码,因为在数据中用md5给加密过所有如果相等就必须加md5
$pwd=md5($_POST['pwd']);

//准备sql语句
//只判断用户名是否正确如果正确才会正确的执行
$sql="select id,username,password,sex,aihao,qx,sign,rip,rtime,pic from user where username='{$username}'";
//执行sql语句
$res=mysqli_query($link,$sql);
if($res && mysqli_num_rows($res)){
	//用户名正确 然后验证密码
	$uifo=mysqli_fetch_assoc($res);
	if($uifo['password']==$pwd){
		if($uifo['qx']==2){
			//用户名密码都正确 验证都ok 可以登录后台登录成功后将值存储到cookie中
			setcookie('username',$uifo['username'],time()+3600*24);
			setcookie('uid',$uifo['id'],time()+3600*24);
			setcookie('pic',$uifo['pic'],time()+3600*24);
			setcookie('qx',$uifo['qx'],time()+3600*24);
			echo'<script>alert("恭喜您登录成功！");window.location.href="index.php";</script>';
		}else{
			echo'<script>alert("不好意思,您的权限不足！");window.location.href="login.html";</script>';
		}
	}else{
		echo '<script>alert("不好意思,您输入的密码有误,请重新输入！");window.location.href="login.html";</script>';
	}
	
}else{
	echo '<script>alert("不好意思,您输入的用户名有误,请重新输入！");window.location.href="login.html";</script>';
}


?>