<?php

//包含数据配置文件就是常量
include '../public/conf/const.php';
//包含数据库文件,连接数据库 数据库是disuz
include '../public/conn.php';
@$uid=$_GET['uid'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
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
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理&nbsp;&nbsp;>&nbsp;&nbsp;添加用户</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<!--这个是传值的地方-->
	<?php
	  $sql="select  id,username,sex,aihao,qx,sign,pic from user where id={$uid}";//查询
	  $res=mysqli_query($link,$sql);
	  if($res && mysqli_num_rows($res)){
		  while($uifo=mysqli_fetch_assoc($res)){
	  ?>
	 
	  
    <form method="post" action="doedit.php" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
	<!--这个是用户名的地方-->
	 
	  <input type="hidden" name="uid" value="<?php  echo $uifo['id'];    ?>">
	  <input type="hidden" name="oldtp" value="<?php  echo $uifo['pic'];    ?>">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray" >用户名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="username" value="<?php  echo $uifo['username'];?>" class="text-word">
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
		<!--这个是爱好的地方-->
		<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">爱好：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="checkbox" name="aihao[]" value="1" <?php if($uifo['aihao']==1){echo "checked";}?>>读书
		<input type="checkbox" name="aihao[]" value="2" <?php if($uifo['aihao']==2){echo "checked";}?>>登山
		<input type="checkbox" name="aihao[]" value="3" <?php if($uifo['aihao']==3){echo "checked";}?>>学习
		<input type="checkbox" name="aihao[]" value="4" <?php if($uifo['aihao']==4){echo "checked";}?>>游戏
        </td>
        </tr>
		<!--图片的地方-->
		<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">图片：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="pic"> <img src="../uploads/default.jpg">
        </td>
        </tr>
		<!--这个是权限的地方-->
		<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">权限：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="qx" id="qx">
	    <option value="1" <?php echo ($uifo['qx'] == 1) ? 'selected' : '';?>>&nbsp;&nbsp;普通用户</option>
	    <option value="2" <?php echo ($uifo['qx'] == 2) ? 'selected' : '';?>>&nbsp;&nbsp;管理员</option>
		</select>
		<!--这里是个性签名-->
		  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">个性签名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
		<textarea name="sign" style="width:300px;height:50px;resize:none;"><?php echo $uifo['sign'];?></textarea>
        </td>
        </tr>
        </td>
        </tr>
		 <?php
	  }
	 }else{
		 echo '没有查询到结果';
	 }
	?>
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
</body>
</html>