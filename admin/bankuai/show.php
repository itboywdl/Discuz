<?php
//引用配置文件
include '../public/conf/const.php';
//引用数据库文件
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
    <td width="99%" align="left" valign="top">您的位置：用户管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
		 <!--这里是搜索的地方-->
	         <form method="get" action="show.php">
	         <span>分区名称：</span>
	         <input type="text" name="fname" value="" placeholder="请以板块名称进行搜索！" class="text-word">
	         <input name="" type="submit" value="搜索" style="margin-top:8px; height:25px;">
	         </form>
			 <!--这里是搜索结束的地方-->
			 
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">添加板块</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">分区名称</th>
        <th align="center" valign="middle" class="borderright">版块名称</th>
        <th align="center" valign="middle">操作</th>
      </tr>
	  <!--在这里循环-->
	  
	  
	  <?php
	  //这里是搜索页面的代码
	  if(isset($_GET['fname'])){
		  $where=" and cname like '%{$_GET['fname']}%'";
	  }else{
		  $where='';
	  }
	  //这里是搜索页面的结束代码
	  
	  
	  
	  //这里是分页的代码
	 /*  $pagerow=2;
		 //当前的页数
		 $page=isset($_GET['page'])?$_GET['page']:1;
		 //这个是每页显示的条数
		 $offect=($page-1)*$pagerow;
		 //这个是分页显示的命令
		  $limit="limit {$offect},{$pagerow}";
	  
	   */
	  
	   //这里是分页结束的代码
	  
	  
	  /*关联查询*/
	  //关联查询 字段冲突必须加表名修饰  必须有关联条件
		//查询分区表中的分区名称和版块表中的id与版块名称  条件是分区表中的id与版块表中的pid是相等的(设计表时设计的)
	   //准备sql语句
	   //{$limit}
	   $sql="select cate.id,pid,pname,cname from part,cate where part.id=cate.pid  {$where} ";
	   //执行sql语句
	   $res=mysqli_query($link,$sql);
	   if($res&& mysqli_num_rows($res)){
		   while ($buifo=mysqli_fetch_assoc($res)){
	  ?>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $buifo['id']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $buifo['pname'];?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $buifo['cname']; ?></td>
        <td align="center" valign="middle" class="borderbottom"><a href="edit.php?edit=<?php echo $buifo['id'];  ?>&pid=<?php echo $buifo['pid']; ?>" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span><a href="del.php?del=<?php echo $buifo['id'] ;?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
	  <?php
	  	   }
	   }else{
		   echo '不好意思没有结果';
	   }
	  ?>
	    <!--在这里循环结束-->
		<?php
	/* 	$ppage=$page-1;
	 if($ppage<1){
		 $ppage=1;
	 }
	 
	 
	 //这里是下一页的
	 //当前页加一
	 $npage=$page+1;
	 $ksql="select count(*) as c from cate";//统计表中的条数
	 $kres=mysqli_query($link,$ksql);//执行sql语句
	 if($kres&&mysqli_num_rows($kres)){
		 $uifo=mysqli_fetch_assoc($kres);
	 }
	 $total=$uifo['c'];
	
	 //这个是总页数为了不让他一直加一
	 $zpage=ceil($total/$pagerow);
	 //var_dump($total);
	 if($npage>$zpage){
		 $npage=$zpage;
	 }
	 //这里是下一页的结束
		 */
		?>
		
		
		
    </table></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="fenye"><?php //echo $total; ?> 11条数据 <?php //echo $page ?>2/<?php //echo $pagerow ?> 5页&nbsp;&nbsp;<a href="show.php?page=1" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;<a href="show.php?page=<?php //echo $ppage; ?>" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;<a href="show.php?page=<?php //echo $npage;  ?>" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;<a href="show.php?page=<?php //echo $zpage; ?>" target="mainFrame" onFocus="this.blur()">尾页</a></td>
  </tr>
</table>
</body>
</html>