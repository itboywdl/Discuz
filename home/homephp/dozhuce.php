<?php
//引用数据库的配置文件
include '../../admin/public/conf/const.php';
//引用数据库的连接文件
include '../../admin/public/conn.php';
//从zhuce.php中接收的username的值(用户名)
if(isset($_POST['username'])){//这个是判断是否传值如果传值就用传的值
	$username=$_POST['username'];
}else{
	$username='';//如果没有就使用''空
}
//从zhuce.php中接收的pass的值(密码)
//if(isset($pass)){//这个是判断是否传值如果传值就用传的值
	$pass=$_POST['pass'];
//}

$repass=$_POST['repass'];



//判断密码和确认密码是否相等如果不相等则输出相应的信息
if($pass!=$repass){
	echo'<script>alert("您输入的两次密码不一致，请您重新输入");window.location.href="./add.php";</script>';
}else{
	$newpass = md5($pass);//如果相等那么md5加密
}
if(isset($_POST['email'])){
//从zhuce.php表单中接过来的Emil
		$emil=$_POST['email'];
	}else{
		$emil='';
	}
	$rip=$_POST['ip'];
	//IP
	if($rip == '::1'){
	$rip = '127.0.0.1';
}
//ip int  ip2long long2ip
$newrip = ip2long($rip);
	
//准备sql语句
$sql="insert into user(username,password,email,rip) values('{$username}','{$newpass}','{$emil}','{$newrip}')";
//执行sql语句
$res=mysqli_query($link,$sql);
//开始判断
if($res){//判断成功则输出成功
	echo'<script>alert("恭喜您注册成功！");window.location.href="../index.php";</script>';
	}else{//判断失败就输出失败
		echo'<script>alert("注册失败！");window.location.href="../zhuce.php";</script>';
	} 
?>