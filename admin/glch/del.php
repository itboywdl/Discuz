<?php
//连接数据库配置文件
include '../public/conf/const.php';
//连接数据库文件
include '../public/conn.php';
/*  var_dump($link);
 exit; */

$id=$_GET['id'];
 //准备sql语句
$sql="delete from glch where id={$id}";
/* echo $sql;
exit; */
//执行sql语句
$res=mysqli_query($link,$sql);
//判断
if($res){
		echo'<script>alert("恭喜您删除成功!");window.location.href="./show.php";</script>';
}else{
	echo'<script>alert("删除失败!");window.location.href="./show.php";</script>';
}
//关闭数据库
mysqli_close($link); 

 
 
 
 
?>