<?php
//包含数据库的配置文件
include '../public/conf/const.php';
//包含数据库的连接
include '../public/conn.php';
/* var_dump($link);
exit; */
//接受的网站配置的id
$id=$_GET['id'];
//准备sql语句
$sql="delete from wzpz where id={$id}";
//执行sql语句
$res=mysqli_query($link,$sql);
if($res){
	echo '<script>alert("删除成功!");window.location.href="show.php";</script>';
}else{
	echo '<script>alert("删除失败!");window.location.href="show.php";</script>';
}

?>