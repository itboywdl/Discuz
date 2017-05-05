<?php
//连接数据的配置文件
include '../public/conf/const.php';
//连接数据的文件
include '../public/conn.php';
//从show.php中把删除用get传值给$d
$d=$_GET['d'];
//准备sql语reply
$sql1="select id,pid,cname from cate  where pid={$d}";
$ress=mysqli_query($link,$sql1);
if($ress && mysqli_num_rows($ress)){
	echo'<script>alert("对不起你删除分区,底下有板块不能删除！");window.location.href="show.php";</script>';
}else{
	
$sql="delete from part where id='{$d}'";
$res=mysqli_query($link,$sql);//执行语句
if($res){
	echo'<script>alert("删除成功！");window.location.href="show.php";</script>';
}else{
	echo'<script>alert("删除失败！");window.location.href="show.php";</script>';
}
	
}




$mysqli_close($link);//关闭数据库
?>