<?php
//连接数据的配置文件
include '../public/conf/const.php';
//连接数据库的文件
include '../public/conn.php';
/* var_dump($link); */
//接收回帖id
$hid=$_POST['hid'];

//接收的回帖的内容
$title=$_POST['title'];
//接收的回帖时间
$time=$_POST['time'];
//准备sql语句
$replysql="update reply set content='{$title}',ptime='{$time}' where id='{$hid}'";
/* echo $replysql;
exit; */
//执行ssql语句
$res=mysqli_query($link,$replysql);
//判断
if($res){
	echo '<script>alert("修改成功");window.location.href="./show.php";</script>';
}else{
	echo '<script>alert("修改失败");window.location.href="./show.php";</script>';
}
//关闭数据库
mysqli_close($link);
?>