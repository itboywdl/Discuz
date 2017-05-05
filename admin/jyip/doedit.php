<?php
//连接数据库配置文件
include '../public/conf/const.php';
//连接数据库文件
include '../public/conn.php';
 /* var_dump($link);
 exit; */
//隐藏域的值
$id=$_POST['id'];
 //记得接值
 //过滤词汇
$ip=$_POST['ip'];

 $kg=$_POST['kg'];
 if($kg==1){
	 $kgg=1;
 }else{
	 $kgg=2;
 }
 
//准备sql语句
$sql="update jip set bip='{$ip}',kg='{$kg}' where id='{$id}'";
/* echo $sql;
exit; */
//执行sql语句
$res=mysqli_query($link,$sql);
//判断
if($res){
		echo'<script>alert("恭喜您修改成功!");window.location.href="./show.php";</script>';
}else{
	echo'<script>alert("修改失败!");window.location.href="./show.php";</script>';
}
//关闭数据库
mysqli_close($link); 

 
 
 
?>