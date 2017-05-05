<?php
//包含数据配置文件就是常量
include '../public/conf/const.php';
//包含数据库文件,连接数据库 数据库是disuz
include '../public/conn.php';
//接受show的页面中的edit的id
$edit=$_GET['edit'];

//准备sql语句
$sql="delete from yqlj  where id={$edit}";
//执行sql语句
$res=mysqli_query($link,$sql);
if($res){
	echo'<script>alert("恭喜您删除成功");window.location.href="show.php";</script>';
}else{
	echo '<script>alert("删除失败");window.location.href="dolist.php";</script>';
}
//关闭数据库
mysqli_close($link);


?>