<?php
//包含数据配置文件就是常量
include '../public/conf/const.php';
//包含数据库文件,连接数据库 数据库是disuz
include '../public/conn.php';
//包含上传下载的图片
include '../public/func.inc.php';
$uid=$_POST['uid'];
$username=$_POST['username'];//用户名

$sex=$_POST['sex'];//性别
$oldtp=$_POST['oldtp'];//原来的图片

//爱好，因为是数组所以转成字符串
if(isset($aihao)){
	$aihao=implode(',',$_POST['aihao']);
}else{
	$aihao=1;
}

//权限
$qx=$_POST['qx'];

//个性签名
$sign=$_POST['sign'];

//如果没有用户没有修改图片就用默认的
if($_FILES['pic']['error']==4){
	$tp=$_POST['oldtp'];
//如果修改了就保存到upload中
	}else{
	$tp=upload('pic','../uploads');
	//上传后进行缩放 调用缩放函数 把头像 统一都变为 50 50
	imageUpdateSize('../uploads/'.$tp, 50, 50);
	//unlink('../uploads/'.$tp);
}



//准备修改sql的语句
$sql="update user set  username='{$username}',sex='{$sex}',aihao='{$aihao}',qx='{$qx}',sign='{$sign}',pic='{$tp}' where id={$uid}";

//执行sql的语句
$res=mysqli_query($link,$sql);

//如果成功则修改成功
if($res){
	echo '<script>alert("修改成功");window.location.href="dolist.php";</script>';
}else{
	//如果失败就修改失败
	echo '<script>alert("修改失败");window.location.href="dolist.php";</script>';
}



mysqli_close($link);
?>