<?php
//包含数据配置文件就是常量
include '../public/conf/const.php';
//包含数据库文件,连接数据库 数据库是disuz
include '../public/conn.php';
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
    <td width="99%" align="left" valign="top">您的位置：用户人员</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="dolist.php">
	         <span>管理员：</span>
	         <input type="text" name="uname" value="" class="text-word" placeholder="请以用户名进行查询！">
	         <input type="submit" value="搜索" style="margin-top:8;height:26px" >
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">用户名</th>
        <th align="center" valign="middle" class="borderright">权限</th>
        <th align="center" valign="middle" class="borderright">性别</th>
		
		<th align="center" valign="middle" class="borderright">IP</th>
		
        <th align="center" valign="middle" class="borderright">注册时间</th>
		<th align="center" valign="middle" class="borderright">头像</th>
        <th align="center" valign="middle">操作</th>
      </tr>

	  <?php
		 //---------------这个是搜索的地方,以用户名的方式------------//
		  if(isset($_GET['uname'])){
		  $where="where username like '%{$_GET['uname']}%'"; 
		 } else{
			 $where='';
			 $_GET['uname']='';
		 }
		 
		//---------------这个是搜索的地方,以用户名的方式------------//
		
		//---------------这个是分页的地方----------------------//
		
		//当前页
		$page=isset($_GET['page']) ? $_GET['page'] : 1;
		//这个要每页显示的条数
		$pagerow=3;
		//n (当前页-1) * 每页显示的条数
		$offset=($page-1)*$pagerow;
		$limit="limit {$offset},{$pagerow}";

		
		
	  $sql="select id,username,password,qx,sign,rip,rtime,pic,sex from user  {$where} {$limit} ";//查询
	  $res=mysqli_query($link,$sql);
	  if($res && mysqli_num_rows($res)){
		  while($uifo=mysqli_fetch_assoc($res)){
	  ?>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	  <form action="./del.php" method="post">
        <td align="center" valign="middle" class="borderright borderbottom">
		<input type="checkbox" name="bh[]" value="<?php  echo $uifo['id']; ?>">
		<?php echo $uifo['id'];  ?>
		</td>
	
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $uifo['username'];  ?></td>
		
       <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($uifo['qx'] == 1) ? '普通用户' : '管理员';?></td>
	   
	   <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($uifo['sex'] == 1) ? '男' : '女';?></td>
	   
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo long2ip($uifo['rip']);  ?></td>
        <td align="center" valign="middle" class="borderright borderbottom">
		<?php echo date('Y-m-d H:i:s',$uifo['rtime']);  ?></td>
		
		<td align="center" valign="middle" class="borderright borderbottom"><img src="../uploads/s_<?php echo $uifo['pic'];?>"></td>
		 
        <td align="center" valign="middle" class="borderbottom">
		<a href="edit.php?uid=<?php echo $uifo['id'];  ?>" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span>
		
		<a href="del.php?uid=<?php echo $uifo['id'];  ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
     <?php
	  }
	 }else{
		 echo '没有查询到结果';
	 }
	?>
    </table></td>
	
    </tr>
	<?php
	
	
	//计算上一页
	$pnext = $page - 1;
	//越界判断  最小值1
	if($pnext < 1){
		$pnext = 1;
	}
	
	//点击下一页,当前页加一
	 $npage=$page+1;
	 //做越界判断  下一页不能大于总页数 = ceil(总条数 / 每页显示的条数)
	 //查找数据库的总页数
	 $tsql="select count(*) as c from user {$where}";
	 $tres=mysqli_query($link,$tsql);
	 if($tres&&mysqli_num_rows($tres)){
		 $uifo=mysqli_fetch_assoc($tres);
	 }
	 $total=$uifo['c'];

	 
	 //总页数
	 $zpage=ceil($total / $pagerow);
	 if($npage>$zpage){
		 $npage= $zpage;
	 }
	?>
  <tr>
    <td align="left" valign="top" class="fenye"><?php echo $total; ?> 条数据 <?php echo $page; ?>/<?php echo$pagerow; ?> 页&nbsp;&nbsp;
	<a href="dolist.php?page=1" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;
	
	<a href="./dolist.php?page=<?php  echo $pnext; ?>" target="mainFrame" onFocus="this.blur()">上一页</a>
	
	&nbsp;&nbsp;<a href="./dolist.php?page=<?php echo $npage;?>&uname=<?php	echo $_GET['uname'];?>" target="mainFrame" onFocus="this.blur()">下一页</a>
	
	&nbsp;&nbsp;
	<a href="dolist.php?page=<?php  echo $zpage; ?>" target="mainFrame" onFocus="this.blur()">尾页</a>
	</td>
  </tr>

</table>
  <input type="submit" value="批量删除">
  	</form>
</body>
</html>