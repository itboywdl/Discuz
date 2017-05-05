	<!--这个是最顶部-->
    	<div class="top">
        	<div class="top1"><a href="./index.php">设置首页</a> <a href="#">收藏本站</a></div>
            <div class="top2"><img src="../images/topright.gif"></div>
         </div>
<?php
session_start();
//连接数据库配置文件
include '../admin/public/conf/const.php';
//连接数据库文件
include '../admin/public/conn.php';
//引用数据库的文件配置文件
include '../admin/filewzpz/webconfig.php';
include './public/tou.php';
$uid=$_GET['uid'];
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="../public/tou.css" rel="stylesheet">
<link href="../css/header2.css" rel="stylesheet">
<link href="../css/index.css" rel="stylesheet">


<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(images/main/add.jpg) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9; font-size:14px; font-weight:bold; padding:10px 10px 10px 0; width:120px;}
.main-for{ padding:10px;}
.main-for input.text-word{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; padding:0 10px;}
.main-for select{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666;}
.main-for input.text-but{ width:100px; height:40px; line-height:30px; border: 1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
#addinfo a{ font-size:14px; font-weight:bold; background:url(images/main/addinfoblack.jpg) no-repeat 0 1px; padding:0px 0 0px 20px; line-height:45px;}
#addinfo a:hover{ background:url(images/main/addinfoblue.jpg) no-repeat 0 1px;}
</style>
</head>
<body>
<!--main_top-->
<table width="1000px" border="0" cellspacing="0" cellpadding="0" id="searchmain">
<?php
//准备sql语句
$sql="select id,username,pic,sign,rtime,sex from user where id={$uid}";
$res=mysqli_query($link,$sql);
if($res&&mysqli_num_rows($res)){
	$uifo=mysqli_fetch_assoc($res);
}


?>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="dogerenzhongxin.php" enctype="multipart/form-data">
	<input type="hidden" name="oldtp" value="<?php echo $uifo['pic']; ?>">
	<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">用户名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="yhm" value="<?php  echo $uifo['username']; ?>" class="text-word">
        </td>
        </tr>
		
		<!--图片的地方-->
		<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">图片：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="pic"><img width="150" height="150" src="../admin/uploads/<?php echo $uifo['pic']; ?>">
        </td>
        </tr>
		
 	<!--这个是性别的地方-->
		<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">性别：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="radio" name="sex" value="1" <?php if($uifo['sex']==1){echo "checked";}?>>男
		<input type="radio" name="sex" value="2" <?php if($uifo['sex']==2){echo "checked";}?>>女
        </td>
        </tr>
		
		<!--这里是个性签名-->
		  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">个性签名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
		<textarea name="sign" style="width:300px;height:50px;resize:none;">
			<?php echo $uifo['sign'];?>
		</textarea>
        </td>
        </tr>
		
		
     
    
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input name="" type="submit" value="提交" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
        </tr>
    </table>
    </form>
    </td>
    </tr>
</table>

<?php
include './public/footer.php';
?>
</body>
</html>