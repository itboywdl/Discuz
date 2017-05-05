<?php
session_start();
if($_SESSION['qx']==1){
	echo'<script>alert("不好意思,您的权限不足,不能进入后台！");window.location.href="../index.php";</script>';
}else{
	header('location:../../admin/index.php');
}

?>