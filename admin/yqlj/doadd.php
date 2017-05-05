<?php
//连接数据库的配置文件
include '../public/conf/const.php';
//连接数据的文件
include '../public/conn.php';
//引用上传下载的文件
include '../public/func.inc.php';
//var_dump($link);

//var_dump($_FILES);
//从表单接过来的标题管理的name
$title=$_POST['title'];

//从表单接过来的标题管理的name
$url=$_POST['url'];

//从表单接过来的图片管理的name

//前台 只有有这个用户(用户名密码都符合)就可以登录session
//接用户名密码 进行验证使用查询  后台 用户名密码都符合并且有权限才能登录  登录成功后将信息存储到cookie中

//var_dump($_POST);
//从表单接过来的描述管理的name
$miaoshu=$_POST['miaoshu'];

//从表单接过来的描述图片的默认值

//如果没有用户没有修改图片就用默认的

	

/* var_dump($_FILES);
exit; */
//准备sql插入语句
$sql="insert into yqlj(title,url,xq) values('{$title}','{$url}','{$miaoshu}') ";
$res=mysqli_query($link,$sql);//执行这条语句
if($res){
		echo '<script>alert("添加成功！");window.location.href="show.php";</script>';
}else{
	echo '<script>alert("添加失败！");window.location.href="show.php";</script>';
}


























?>