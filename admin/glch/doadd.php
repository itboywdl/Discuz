<?php
//连接数据库配置文件
include '../public/conf/const.php';
//连接数据库文件
include '../public/conn.php';
/*  var_dump($link);
 exit; */
//过滤词汇名称
if(isset($_POST['gname'])){
	$gname=$_POST['gname'];
}
//替换过滤词汇名称
if(isset($_POST['pname'])){
	$pname=$_POST['pname'];
}
//替换过滤词汇开关
$kg=$_POST['kg'];
if($kg==1){
	$kg=1;
}else{
	$kg=2;
	}

//准备sql语句
$sql="insert glch(ch,thch,kg) values('{$gname}','{$pname}','{$kg}')";
/* echo $sql;
exit; */
//执行sql语句
$res=mysqli_query($link,$sql);
//判断
if($res){
		echo'<script>alert("恭喜您添加成功!");window.location.href="./show.php";</script>';
}else{
	echo'<script>alert("添加失败!");window.location.href="./add.php";</script>';
}
//关闭数据库
mysqli_close($link); 

















?>