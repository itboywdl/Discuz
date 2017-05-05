<?php
session_start();
//引用数据库的配置文件
include '../admin/public/conf/const.php';
//引用数据的文件
include '../admin/public/conn.php';
//引用上传下载的配置文件
include '../admin/public/func.inc.php';
//var_dump($link);
$yhm=$_POST['yhm'];
//从form表单中接受到的隐藏域id
$id=$_POST['id'];
//这是接受的图片
//var_dump($id);
//exit;

//这个是从form中接受的个性签名
$sign=$_POST['sign'];

//如果没有用户没有修改图片就用默认的
 if($_FILES['pic']['error']==4){
	$tp=$_POST['oldtp'];
//如果修改了就保存到upload中
	}else{
	$tp=upload('pic','../admin/uploads');
	imageUpdateSize('../admin/uploads/'.$tp, 50, 50);
	
	//unlink('../admin/uploads'.$tp);
} 


//准备修改sql的语句
$sql="update user set  username='{$yhm}',pic='{$tp}',sign='{$sign}' where id={$id}";
/* echo($sql);
exit; */

//执行sql的语句
$res=mysqli_query($link,$sql);

//如果成功则修改成功
if($res){
	$_SESSION['pic']=$tp;
	$_SESSION['username']=$yhm;
	$_SESSION['sign']=$sign;
	echo '<script>alert("修改成功");window.location.href="./index.php";</script>';
}else{
	//如果失败就修改失败
	echo '<script>alert("修改失败");window.location.href="./index.php";</script>';
}


exit;
?>
