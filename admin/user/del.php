<?php
//$bh=$_POST['g'];
//包含数据配置文件就是常量
include '../public/conf/const.php';
//包含数据库文件,连接数据库 数据库是disuz
include '../public/conn.php';

if(isset($_GET['uid'])){
	$uid=$_GET['uid'];
}else{
	$uid='';
}

if(isset($_POST['bh'])){
	$bh=$_POST['bh'];
}else{
	$bh=1;
}
@$s=implode(',',$bh);


$sql="delete from user where id in({$s})";
$res=mysqli_query($link,$sql);
//如果成功则删除成功
if($res){
	$psql="delete from post where cid in ({$s})";
	$pres=mysqli_query($link,$psql);
	if($pres){
	echo '<script>alert("删除成功！");window.location.href="dolist.php";</script>';
	}
}elseif($res){			
	//如果失败就删除失败
	echo '<script>alert("删除失败！");window.location.href="dolist.php";</script>';
}


//执行删除单条语句
$sql="delete from user where id={$uid}";
//执行sql的语句
$res=mysqli_query($link,$sql);
//如果成功则删除成功
if($res){
	//如果用户名底下板块底下有发帖的内容会一起删除
	$fsql="delete from post where cid={$uid}";
	$fres=mysqli_query($link,$fsql);
	if($fres){
	echo '<script>alert("删除成功");window.location.href="dolist.php";</script>';
	}
}else{
	//如果失败就删除失败
	echo '<script>alert("删除失败");window.location.href="dolist.php";</script>';
}


//关闭数据库连接
mysqli_close($link);

?>