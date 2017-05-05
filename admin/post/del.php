<?php
/* //连接数据库的文件
include '../public/conf/const.php';
//连接数据库的配置文件
include '../public/conn.php';
//var_dump($link);
//获取发帖的id
$fid=$_GET['fid'];
//准备sql语句
$sql="delete from post where id='{$fid}'";
//执行sql语句
$res=mysqli_query($link,$sql);
//判断
if($res){
	echo '<script>alert("删除成功！");window.location.href="./show.php";</script>';
}else{
	echo '<script>alert("删除失败！");window.location.href="./show.php";</script>';
}
//关闭数据库
mysqli_close($link); */


//$fid=$_GET['fid'];
 //连接数据库的文件
include '../public/conf/const.php';
//连接数据库的配置文件
include '../public/conn.php';
//var_dump($link);
//获取发帖的id
$fid=$_GET['fid'];
//查询post中的字段
//准备sql语句
$psql="select cid,title,content,ptime,uid from post where id={$fid}";
//执行sql语句
$pres=mysqli_query($link,$psql);
if($pres&&mysqli_num_rows($pres)){
	while($puifo=mysqli_fetch_assoc($pres)){
		//准备sql语句
		$sql="insert into hsz(cid,title,content,ptime,uid) values('{$puifo['cid']}','{$puifo['title']}','{$puifo['content']}','{$puifo['ptime']}','{$puifo['uid']}')";
		//执行sql语句
		$res=mysqli_query($link,$sql);
		//判断
		if($res){
			echo '<script>alert("放入回收站成功！");window.location.href="./show.php";</script>';
			$sql="delete from post where id='{$fid}'";
			$res=mysqli_query($link,$sql);
		}else{
			echo '<script>alert("放入回收站失败！");window.location.href="./show.php";</script>';
		}
	}
}


//关闭数据库
mysqli_close($link);






?>