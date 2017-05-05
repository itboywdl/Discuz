<?php
 //连接数据库的文件
include '../public/conf/const.php';
//连接数据库的配置文件
include '../public/conn.php';
/* var_dump($link); 
exit; */
$hid=$_GET['hid'];
//准备sql语句
$psql="select cid,title,content,ptime,uid from hsz where id={$hid}";
//执行sql语句
$pres=mysqli_query($link,$psql);
if($pres&&mysqli_num_rows($pres)){
	while($puifo=mysqli_fetch_assoc($pres)){
		//准备sql语句
		$sql="insert into post(cid,title,content,ptime,uid) values('{$puifo['cid']}','{$puifo['title']}','{$puifo['content']}','{$puifo['ptime']}','{$puifo['uid']}')";
		//执行sql语句
		$res=mysqli_query($link,$sql);
		//判断
		if($res){
			echo '<script>alert("还原成功！");window.location.href="../hsz/show.php";</script>';
			$sql="delete from hsz where id='{$hid}'";
			$res=mysqli_query($link,$sql);
		}else{
			echo '<script>alert("还原失败！");window.location.href="./show.php";</script>';
		}
	}
}


//关闭数据库
mysqli_close($link);



?>