<?php
session_start();
//包含数据配置文件就是常量
include '../public/conf/const.php';
//包含数据库文件,连接数据库 数据库是disuz
include '../public/conn.php';
//执行添加页面 接收表单数据 添加到用户user表中
$username=$_POST['username'];//从add.html中接收的username的值(用户名)
if($username==""){//判断用户名是否输入如果不输入则提醒
	echo'<script>alert("请输入用户名！");window.location.href="add.php";</script>';
}
//用户名请输入3-12位
if(strlen($username)<3||strlen($username)>=12){
	echo'<script>alert("请您输入合法的用户名！");window.location.href="add.php";</script>';
}
//接收session中值
$syzm=$_SESSION['code'];
//var_dump($syzm);
//接收验证码的值
$yzm=$_POST['yzm'];
/* var_dump($yzm);
exit; */
//判断session中的验证码和表单中的值是否相等
if($syzm!=$yzm){
	echo'<script>alert("对不起您输入的验证码不正确!");window.location.href="add.php";</script>';
}

$pass=$_POST['pass'];//从add.html中接收的pass的值(密码)
if($pass==""){//如果不输入密码会弹出对话框
	echo'<script>alert("请输入密码！");window.location.href="add.php";</script>';
}
//这里是密码必须输入3到18之间
if(strlen($username)<3||strlen($username)>=18){
	echo'<script>alert("请您输入合法的密码！");window.location.href="add.php";</script>';
}



$repass=$_POST['repass'];
//从add.html中接收的repass的值(确认密码)

if($repass==""){//如果不输入密码会弹出对话框
	echo'<script>alert("请输入确认密码！");window.location.href="add.php";</script>';
}
$sex=$_POST['sex'];





$qx=$_POST['qx'];//从add.html中接收的qx的值(权限)

if($pass!=$repass){
	echo'<script>alert("您输入的两次密码不一致，请您重新输入");window.location.href="./add.php";</script>';
}else{
	$newpass = md5($pass);
}
$rip = $_SERVER['REMOTE_ADDR']; //::1  127.0.0.1

if($rip == '::1'){
	$rip = '127.0.0.1';
}
//ip int  ip2long long2ip
$newrip = ip2long($rip);
$rtime=time();
$sql = "insert into user(username,password,qx,rip,sex,rtime) values('{$username}','{$newpass}','{$qx}','{$newrip}','{$sex}','{$rtime}')";

//执行添加
if(mysqli_query($link, $sql)){
	echo '<script>alert("添加成功");window.location.href="dolist.php";</script>';
}else{
	echo '<script>alert("添加失败");window.location.href="add.php";</script>';
}
//关闭数据库连接
mysqli_close($link);






















?>