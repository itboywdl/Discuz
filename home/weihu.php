<?php
//引用数据库的文件配置文件
include '../admin/filewzpz/webconfig.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8" content="<?php echo WZ_CONST; ?>">

<title><?php echo WZ_NAME; ?></title>

<link href="../public/tou.css" rel="stylesheet">
<link href="../css/header2.css" rel="stylesheet">
<link href="../css/index.css" rel="stylesheet">
</head>

<body>
    <!--这个是最顶部-->
    	<div class="top">
        	<div class="top1"><a href="#">设置首页</a> <a href="#">收藏本站</a></div>
            <div class="top2"><img src="../images/topright.gif"></div>
         </div>

         
    <!--这个是整体的边框-->
    <div id="border">
	
	<!--这个是引用的是文件头-->
    <?php  
	include './public/tou.php';
	?>
<div style="margin:30px; color:red">不好意思亲，系统正在维护升级中......</div>


<?php
//引用文件尾
include './public/footer.php';
?>
<?php
if(WZ_KG==1){
	echo '<script>alert("恭喜您网站升级成功！");window.location.href="./index.php";</script>';
}

?>









