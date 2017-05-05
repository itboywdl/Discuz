<?php
//包含数据库的配置文件
include '../public/conf/const.php';
//包含数据库的连接
include '../public/conn.php';
//包含上传下载的图片
include '../public/func.inc.php';
//var_dump($_FILES);
//exit;
//var_dump($link);
//网站名称
$wzname=$_POST['wzname'];
//网站关键字
$wzconst=$_POST['wzconst'];
//网站版权
$wzbq=$_POST['wzbq'];

//如果没有用户没有修改图片就用默认的
/* if($_FILES['pic']['error']==4){
	$tp=$_POST['oldtp'];
//如果修改了就保存到upload中
	}else{
	$tp=upload('pic','../uploads');
}
 */

//准备sql语句
$sql="insert into wzpz(wzname,wzconst,wzbq) values('{$wzname}','{$wzconst}','{$wzbq}')";
//执行sql语句
$res=mysqli_query($link,$sql);
//判断
if($res){
	echo '<script>alert("添加成功");window.location.href="show.php";</script>';
}else{
	echo '<script>alert("添加失败");window.location.href="add.php";</script>';
}




?>