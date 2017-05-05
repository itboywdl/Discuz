<?php
header('Content-type:text/html;charset=utf-8');
//环境监测 常量 函数
echo 'php版本：'.PHP_VERSION.'<br>';
//目录文件 权限 可写 is_writable true false
if(is_writable('../images')){
	echo 'images目录有可写权限<br>';
}else{
	echo 'images目录有没有可写权限<br>';
}

//函数依赖性检查 是否支持php扩展 function_exists

if(function_exists('imagecreatetruecolor')){
	echo '支持GD<br>';
}else{
	echo '不支持GD<br>';
}
?>
<form action="install3.php" method="post">
	<input type="submit" value="下一步">
</form>