<?php
/**
*连接数据的代码
*/

//1连接数据库服务器
$link=@mysqli_connect(DB_HOST,DB_USER,DB_PASS);
//2判断数据库是否连接成功
if(mysqli_connect_errno()){
	echo '数据库连接失败,它的原因是：'.mysqli_connect_error();
	exit;
}
//3选择数据库
mysqli_select_db($link,DB_NAME);
//4.选择字符编码集
mysqli_set_charset($link,DB_CHARSET);




?>