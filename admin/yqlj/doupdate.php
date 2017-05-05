<?php
//连接数据库的配置文件
include '../public/conf/const.php';
//连接数据的文件
include '../public/conn.php';
//引用上传的文件
include '../public/func.inc.php';
//var_dump($link);

//接受隐藏域的id
$uid=$_POST['uid'];

//var_dump($_FILES);
//从表单接过来的标题管理的name
$title=$_POST['title'];

//从表单接过来的标题管理的name
$url=$_POST['url'];

//从表单接过来的图片管理的name
$oldtp=$_POST['oldtp'];

//var_dump($_POST);
//从表单接过来的描述管理的name
$miaoshu=$_POST['miaoshu'];



//如果没有用户没有修改图片就用默认的
if($_FILES['pic']['error']==4){
	$tp=$_POST['oldtp'];
	//如果修改了就保存到upload
}else{
	$tp=upload('pic','../uploads');
}
//var_dump($tp);exit;
/* var_dump($_FILES);
exit; */
//准备sql插入语句
$sql="update yqlj set title='{$title}',url='{$url}',pic='{$tp}',xq='{$miaoshu}' where id={$uid}";
$res=mysqli_query($link,$sql);//执行这条语句
if($res){
		echo '<script>alert("修改成功！");window.location.href="show.php";</script>';
}else{
	echo '<script>alert("修改失败！");window.location.href="show.php";</script>';
}


























?>