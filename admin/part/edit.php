<?php
//引用连接数据库的配置文件
include '../public/conf/const.php';
//引用连接数据的文件
include '../public/conn.php';
//var_dump($link);
$pid=$_POST['pid'];//通过隐藏域然后引用id,因为修改的时候必须有id值
//var_dump($pid);
$pname=$_POST['pname'];
//var_dump($pname);
//准备sql语句
$sql="update part set pname='{$pname}' where id='{$pid}'";
$res=mysqli_query($link,$sql);
if($res){
	echo '<script>alert("修改成功！");window.location.href="show.php";</script>';
}else{
	echo'<script>alert("注册失败！");window.location.href="show.php";</script>';
}
mysqli_close($link);//关闭数据库

?>