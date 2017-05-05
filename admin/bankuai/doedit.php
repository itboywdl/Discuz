<?php
//连接数据库的配置文件
include '../public/conf/const.php';
//连接数据库的文件
include '../public/conn.php';
//var_dump($link);
$fq=$_POST['fq'];//修改分区
$bname=$_POST['bname'];//修改板块的
$edit=$_POST['edit'];//cate的id
//准备
$sql="update cate set pid='{$fq}',cname='{$bname}' where id={$edit}";
$res=mysqli_query($link,$sql);//执行sql
if($res){
	echo '<script>alert("修改成功");window.location.href="./show.php";</script>';
}else{
	echo'<script>alert("修改失败");window.location.href="./show.php";</script>';
}

?>