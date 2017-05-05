<?php
//连接数据库的文件
include '../public/conf/const.php';
//连接数据库的配置文件
include '../public/conn.php';
//var_dump($link);
//发帖的id
$fid=$_GET['fid'];
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
    <td align="left" valign="top">
	<!--这里是循环的地方-->
	<?php
	//准备sql语句
	$ftsql="select id,title,content,ptime,kg,gaoliang,zhiding,jiajing from post where id={$fid}";
	 //var_dump($ftsql);exit;
	//执行sql语句
	$res=mysqli_query($link,$ftsql);
	//判断有没有条数
	if($res&&mysqli_num_rows($res)){
	$uifo=mysqli_fetch_assoc($res);
	?>
    <form method="post" action="doedit.php">
	<!--这个是传的发帖的隐藏域-->
	<input type="hidden" name="fid" value="<?php echo $uifo['id'];?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
	<!--发帖的标题-->
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">发帖的标题：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="title" value="<?php echo $uifo['title']; ?>" class="text-word">
        </td>
       </tr>
	   <!--发帖的内容-->
    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">发帖的内容：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="content" value="<?php echo $uifo['content']; ?>" class="text-word">
        </td>
       </tr>
	   <!--发帖的时间-->
	    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">发帖的时间：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="time" value="<?php echo $uifo['ptime']; ?>" class="text-word">
        </td>
       </tr>  
	   <!--发帖的开关-->
	   <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">发帖的开关：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="kg">
	    <option value="1" <?php echo ($uifo['kg'] == 1) ? 'selected' : '';?>>&nbsp;&nbsp;关闭</option>
	    <option value="2" <?php echo ($uifo['kg'] == 2) ? 'selected' : '';?>>&nbsp;&nbsp;开启</option>
		</select>
        </td>
       </tr>
	   
	    <!--发帖的高亮-->
	   <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">发帖的高亮：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="gaoliang">
	    <option value="1" <?php echo ($uifo['gaoliang'] == 1) ? 'selected' : '';?>>&nbsp;&nbsp;高亮</option>
	    <option value="2" <?php echo ($uifo['gaoliang'] == 2) ? 'selected' : '';?>>&nbsp;&nbsp;不高亮</option>
		</select>
        </td>
       </tr>
	   
	    <!--发帖的加精-->
	   <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">发帖的加精：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="jiajing">
	    <option value="1" <?php echo ($uifo['jiajing'] == 1) ? 'selected' : '';?>>&nbsp;&nbsp;加精</option>
	    <option value="2" <?php echo ($uifo['jiajing'] == 2) ? 'selected' : '';?>>&nbsp;&nbsp;不加精</option>
		</select>
        </td>
       </tr>
	   
	     <!--发帖的置顶-->
	   <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">发帖的置顶：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="zhiding">
	    <option value="1" <?php echo ($uifo['zhiding'] == 1) ? 'selected' : '';?>>&nbsp;&nbsp;置顶</option>
	    <option value="2" <?php echo ($uifo['zhiding'] == 2) ? 'selected' : '';?>>&nbsp;&nbsp;不置顶</option>
		</select>
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
	<!--这里是循环的地方-->
	<?php
	}else{
		echo '不好意思没有查到！';
	}
	?>
    </td>
    </tr>
</table>
</body>
</html>