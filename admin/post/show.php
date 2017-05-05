<?php
//连接数据库的文件
include '../public/conf/const.php';
//连接数据的配置文件
include '../public/conn.php';
//var_dump($link);
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
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
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
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：显示发帖</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="post" action="">
	         <span>管理员：</span>
	         <input type="text" name="" value="" class="text-word">
	         <input name="" type="button" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
	
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">发帖的标题</th>
        <th align="center" valign="middle" class="borderright">发帖的内容</th>
        <th align="center" valign="middle" class="borderright">发帖的时间</th>
        <th align="center" valign="middle" class="borderright">发帖的IP</th>
        <th align="center" valign="middle" class="borderright">发帖的屏蔽</th>
        <th align="center" valign="middle" class="borderright">帖子高亮</th>
        <th align="center" valign="middle" class="borderright">帖子加精</th>
        <th align="center" valign="middle" class="borderright">帖子置顶</th>
        <th align="center" valign="middle">操作</th>
      </tr>
	  <!--这里是循环语句-->
	  <?php
	  //准备sql语句
	  $postsql="select id,title,pip,content,ptime,kg,zhiding,jiajing,gaoliang from post";
	  //执行sql语句
	  $res=mysqli_query($link,$postsql);
	  //判断
	  if($res&&mysqli_num_rows($res)){
		  while($uifo=mysqli_fetch_assoc($res)){
	  ?>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $uifo['id'];?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $uifo['title']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $uifo['content']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $uifo['ptime']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo long2ip($uifo['pip']);  ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php 
		//是否屏蔽该内容
		if($uifo['kg']==1){
			echo '关闭';
			
		}else{
			echo '开启';
		}
		?></td>
		
        <td align="center" valign="middle" class="borderright borderbottom"><?php
		//是否加精的样式显示
		if($uifo['gaoliang']==1){
			echo '高亮';
		}else{
			echo '不高亮';
		}
		?></td>
        
		<td align="center" valign="middle" class="borderright borderbottom"><?php
		//是否加精的样式显示
		if($uifo['jiajing']==1){
			echo '加精';
		}else{
			echo '不加精';
		}
		 ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php 
		//是否置顶的样式显示
		if($uifo['zhiding']==1){
			echo '置顶';
		}else{
			echo '不置顶';
		}
		?></td>
		
		
		
        <td align="center" valign="middle" class="borderbottom"><a href="edit.php?fid=<?php echo $uifo['id']; ?>" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span><a href="del.php?fid=<?php echo $uifo['id']; ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
	  <?php	  
		  }
	  }
	  ?>
    </table>
	 <!--这里是循环语句-->
	</td>
    </tr>
  <tr>
    <td align="left" valign="top" class="fenye">11 条数据 1/1 页&nbsp;&nbsp;<a href="#" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;<a href="#" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;<a href="#" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;<a href="#" target="mainFrame" onFocus="this.blur()">尾页</a></td>
  </tr>
</table>
</body>
</html>