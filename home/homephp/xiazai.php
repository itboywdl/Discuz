<?php
//准备要下载的文件
$filename = '../tupian/14868719597562.jpg';
//告诉浏览器要下载的类型
header('Content-type:image/jpg');
//告诉浏览器要下载的大小
header('Content-length:'.filesize($filename));
//以附件形式下载
header('Content-Disposition:attachment;filename='.basename($filename));
//将内容读给浏览器
readfile($filename);

?>