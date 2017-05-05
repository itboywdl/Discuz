<?php
session_start();
//包含函数库文件 调用验证码函数
include '../public/func.inc.php';
$_SESSION['code']=yzm();



?>