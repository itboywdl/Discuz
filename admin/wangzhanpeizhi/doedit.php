<?php
//包含数据库的配置文件
include '../public/conf/const.php';
//包含数据库的连接
include '../public/conn.php';
//包含数据库的上传下载文件
include '../public/func.inc.php';
/* var_dump($link);
exit; */
//form中的id
$id=$_POST['id'];
//网站的名称
$wzname=$_POST['wzname'];
//网站的关键字
$wzconst=$_POST['wzconst'];
//网站的版权
$wzbq=$_POST['wzbq'];
//如果没有用户没有修改图片就用默认的
if($_FILES['pic']['error']==4){
	$tp=$_POST['oldtp'];
//如果修改了就保存到upload中
}else{
	$tp=upload('pic','../uploads');
}



//准备sql语句
$sql="update wzpz set wzname='{$wzname}',wzconst='{$wzconst}',wzbq='{$wzbq}',wzlogo='{$tp}' where id='{$id}'";
//执行sql语句
$res=mysqli_query($link,$sql);
if($res){
	echo  '<script>alert("修改成功");window.location.href="show.php";</script>';
}else{
	echo  '<script>alert("修改失败");window.location.href="show.php";</script>';
}




















?>