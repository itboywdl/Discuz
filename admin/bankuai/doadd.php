<?php
//引用配置文件
include '../public/conf/const.php';
//引用数据库的文件
include '../public/conn.php';
//var_dump($link);
$fq=$_POST['fq'];//这个是select里的id值
$bname=$_POST['bname'];//板块名称的name
//准备sql语句
$sql="insert into cate(pid,cname) values('{$fq}','{$bname}')";
/* var_dump($sql);
exit; */
//执行sql语句
$res=mysqli_query($link,$sql);
if($res){
 echo'<script>alert("版块添加成功");window.location.href="./show.php";</script>';
}else{
	 echo'<script>alert("版块添加失败");window.location.href="./show.php";</script>';
}
mysqli_close($link);



?>