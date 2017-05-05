<?php
//引用配置文件
include './webconfig.php';
//引用上传下载php
include '../public/func.inc.php';

/* <?php
//网站配置的name
const WZ_NAME ='1111';
//网站的关键字
const WZ_CONST='222';
//网站的版权
const WZ_BANQUAN='333';
//网站logo
const WZ_LOGO='default.jpg';
 */
 //网站配置的名字
$wzname=$_POST['wzname'];
//网站配置的关键字
$wzconst=$_POST['wzconst'];
//网站配置的版权
$wzbq=$_POST['wzbq']; 
//网站配置的开关
$kg=$_POST['kg'];
//原来的图片
$old=$_POST['old'];
//var_dump($_FILES);
if($_FILES['wzlogo']['error']!= 4){
	$newlogo=upload('wzlogo','../uploads/');
	$_POST['WZ_LOGO']=$newlogo;
} else{
	$newlogo=$old;
}
$str="<?php\n";
$str.="const WZ_NAME ='{$wzname}';\n";
$str.="const WZ_CONST='{$wzconst}';\n";
$str.="const WZ_BANQUAN='{$wzbq}';\n";
$str.="const WZ_LOGO='{$newlogo}';\n"; 
$str.="const WZ_KG='{$kg}';";

if(file_put_contents('./webconfig.php',$str)){
	echo '1111';
	echo '<script>alert("修改成功!");window.location.href="./edit.php";</script>';
}else{
	echo '<script>alert("修改失败！");window.location.href="./edit.php";</script>';
}





?>