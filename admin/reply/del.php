<?php
//连接数据库的文件
include '../public/conf/const.php';
//连接数据库的配置文件
include '../public/conn.php';
//var_dump($link);
//接受回帖的id
$hid=$_GET['hid'];

//准备sql语句
$replysql="delete from reply where id={$hid}";
/* echo $replysql;
exit; */
//执行sql语句
$res=mysqli_query($link,$replysql);
//判断
if($res){
	echo '<script>alert("删除成功");window.location.href="./show.php";</script>';
}else{
	echo '<script>alert("删除失败");window.location.href="./show.php";</script>';
}
//关闭数据库
mysqli_close($link);
?>