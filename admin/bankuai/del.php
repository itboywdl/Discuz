<?php
//连接数据库配置文件
include '../public/conf/const.php';
//连接数据库的文件
include '../public/conn.php';

$del=$_GET['del'];//从show中删除链接那接的GET的值
//如果板块下有帖子则不能删除
$sql1="select cid from post where cid={$del}";
/* var_dump($sql1);
exit; */
$ress=mysqli_query($link,$sql1);
if($ress && mysqli_num_rows($ress)){
echo '<script>alert("不好意思板块底下有帖子,请先删除帖子再删除板块!");window.location.href="show.php";</script>';
}
else{
	//准备sql语句
$sql="delete from cate where id='{$del}'";
//执行sql语句
$res=mysqli_query($link,$sql);

if($res){
		echo '<script>alert("版块删除成功!");window.location.href="show.php";</script>';
	}else{
		echo '<script>alert("版块删除失败!");window.location.href="show.php";</script>';
	}
	
}
mysqli_close($link);//关闭数据库


?>