<?php
session_start();
//连接数据库的文件
include '../../admin/public/conf/const.php';
//连接数据库的配置文件
include '../../admin/public/conn.php';
//var_dump($link);
//这是板块的id
/* if(isset($_POST['bkid'])){
	$bkid=$_POST['bkid'];
}else{
	$bkid='';
} */
$bkid=$_POST['bkid'];


if(!isset($_SESSION['username'])){
	exit ('<script>alert("请您先登录,然后再进行回帖!");window.location.href="../tiezixiangqingye.php?bkid='.$bkid.'";</script>');
	
}
//这个是session用户名
//$yhmz=$_POST['yhmz'];
	$uid=$_POST['uid'];
/* if(isset($_POST['uid'])){
	$uid=$_POST['uid'];
}else{
	$uid='';
} */




//发帖的内容//过滤词汇是在这里写
if(isset($_POST['neirong1'])){
	$content=$_POST['neirong1'];
}else{
	$content='';
}
/* var_dump($content);
exit; */
//时间
$time=date('Y-m-d H:i:s',time());
/* var_dump($time);
exit; */





//准备sql语句
$sql="insert into reply(pid,content,ptime,uid)values('{$bkid}','{$content}','{$time}','{$uid}')";
 /* var_dump($sql);
exit;  */
//执行sql语句
$res=mysqli_query($link,$sql);
/* var_dump($res);
exit; */
if($res){
	echo'<script>alert("添加成功!");window.location.href="../tiezixiangqingye.php?bkid='.$bkid.'";</script>';
}else{
	echo'<script>alert("添加失败!");window.location.href="../tiezixiangqingye.php?bkid='.$bkid.'";</script>';
}



?>