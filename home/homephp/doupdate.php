<?php
//引用数据库的配置文件
include '../../admin/public/conf/const.php';
//引用数据库的连接文件
include '../../admin/public/conn.php';
//var_dump($link);
//exit;
//从zhuce.php中接收的username的值(用户名)
/* if(isset($_POST['username'])){ *///这个是判断是否传值如果传值就用传的值
	$username=$_POST['username'];
/* }else{
	$username='';如果没有就使用''空
} */
//从zhuce.php中接收的pass的值(密码)
//if(isset($pass)){//这个是判断是否传值如果传值就用传的值
	$pass=$_POST['pass'];
//}

$repass=$_POST['repass'];
//判断密码和确认密码是否相等如果不相等则输出相应的信息
if($pass!=$repass){
	echo'<script>alert("您输入的两次密码不一致，请您重新输入");window.location.href="../updatemima.php";</script>';
}else{
	$newpass = md5($pass);//如果相等那么md5加密
}

//准备sql语句
$sql="update user set password='{$newpass}' where username='{$username}'";

//执行sql语句
$res1=mysqli_query($link,$sql);
//var_dump($res);
//exit;
//开始判断
if($res1){	//判断成功则输出成功
	echo
	'<script>alert("恭喜您修改成功！");window.location.href="../index.php";</script>';
	}else{//判断失败就输出失败
		echo'<script>alert("修改失败！");window.location.href="../updatemima.php";</script>';
	} 
?>