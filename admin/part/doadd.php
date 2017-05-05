<?php
//包含数据库的配置文件
include '../public/conf/const.php';
//包含数据库的连接
include '../public/conn.php';
//var_dump($link);
$pname=$_POST['pname'];
//var_dump($pname);
//准备sql
$sql="insert into part(pname) values('{$pname}')";//这里加变量必须加单引号
$res=mysqli_query($link,$sql);
if($res){
	echo'<script>alert("注册成功！");window.location.href="show.php";</script>';
}else{
	echo'<script>alert("注册失败！");window.location.href="add.php";</script>';
}

mysqli_close($link);




?>