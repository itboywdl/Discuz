<?php
/* //引用数据库的配置文件
include '../admin/public/conf/const.php';
//引用数据库的连接文件
include '../admin/public/conn.php';
//var_dump($link);
//exit;

//tou.php中的用户名
$name=$_POST['name'];
//tou.php中的密码
$mima=md5($_POST['paw']);

//准备sql语句
$sql="select id,pic,sex,sign,,rip,rtime,qx,email,username,password from user where username='{$name}'";
//执行sql语句
$res=mysqli_query($link,$sql);
if($res && mysqli_num_rows($res)){
	$uifo=mysqli_fetch_assoc($res);
	if($uifo['password']==$mima){
		session_start();
		$_SESSION['username']=$name;//这个是存储用户名的
		$_SESSION['id']=$uifo['id'];//这个是存储的id
		$_SESSION['pic']=$uifo['pic'];//这个是存储的照片
		$_SESSION['sex']=$uifo['sex'];//这个是性别
		$_SESSION['qx']=$uifo['qx'];//这个是权限
		$_SESSION['sign']=$uifo['sign'];//这个是个性签名
		$_SESSION['rip']=$uifo['ip'];//这个是IP
		$_SESSION['rtime']=$uifo['rtime'];//这个是时间
		$_SESSION['email']=$uifo['email'];//这个是email
		echo'<script>alert("恭喜您登录成功！");window.location.href="./index.php";</script>';
	}else{
		echo'<script>alert("不好意思,您输入的密码不存在！");window.location.href="./zhuce.php";</script>';
	}
}else{
	echo'<script>alert("不好意思您输入的用户名不存在,请重新注册一个！");window.location.href="./zhuce.php";</script>';
}
 */

//引用数据库的配置文件
include '../admin/public/conf/const.php';
//引用数据库的连接文件
include '../admin/public/conn.php';
//var_dump($link);
//exit;

//tou.php中的用户名
$name=$_POST['name'];
//tou.php中的密码
$mima=md5($_POST['paw']);

//准备sql语句
$sql="select id,pic,username,password,rtime,sign,qx from user where username='{$name}'";
//执行sql语句
$res=mysqli_query($link,$sql);
if($res && mysqli_num_rows($res)){
	$uifo=mysqli_fetch_assoc($res);
	if($uifo['password']==$mima){
		session_start();
		$_SESSION['username']=$name;//这个是存储用户名的
		$_SESSION['id']=$uifo['id'];//这个是存储的id
		$_SESSION['pic']=$uifo['pic'];//这个是存储的照片
		$_SESSION['rtime']=$uifo['rtime'];//这个是时间
		$_SESSION['sign']=$uifo['sign'];//这个是个性签名
		$_SESSION['qx']=$uifo['qx'];//这个是权限
		echo'<script>alert("恭喜您登录成功！");window.location.href="./index.php";</script>';
	}else{
		echo'<script>alert("不好意思,您输入的密码不存在！");window.location.href="./zhuce.php";</script>';
	}
}else{
	echo'<script>alert("不好意思您输入的用户名不存在,请重新注册一个！");window.location.href="./zhuce.php";</script>';
}








?>