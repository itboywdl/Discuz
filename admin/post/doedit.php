<?php
//连接数据的文件
include '../public/conf/const.php';
//连接数据库的配置文件
include '../public/conn.php';
//var_dump($link);

//接受发帖id的值
$fid=$_POST['fid'];
//接受发帖的标题
$title=$_POST['title'];
//接受发帖的内容
$content=$_POST['content'];
//接受发帖的时间
$time=$_POST['time'];
//开关
$kg=$_POST['kg'];
if($kg==1){
	$kg=1;
}else{
	$kg=2;
}
//发帖的高亮
$gaoliang=$_POST['gaoliang'];
if($gaoliang==1){
	$gaoliang=1;
}else{
	$gaoliang=2;
}
//发帖的加精
$jiajing=$_POST['jiajing'];
#var_dump($jiajing);exit;
/*if($jiajing==1){
	$jiajing=1;
}else{
	$jiajing=2;
}*/

//发帖的置顶
$zhiding=$_POST['zhiding'];


//准备sql语句
$ftsql="update post set title='{$title}',content='{$content}',ptime='{$time}',kg='{$kg}',gaoliang='{$gaoliang}',jiajing='{$jiajing}',zhiding='{$zhiding}' where id='{$fid}'";
//执行sql语句
$res=mysqli_query($link,$ftsql);
//判断
if($res){
	echo '<script>alert("修改成功");window.location.href="./show.php";</script>';
}else{
	echo '<script>alert(修改失败");window.location.href="./show.php";</script>';
}
//关闭数据库
mysqli_close($link);






?>