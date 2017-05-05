<?php
//连接数据库的配置文件
include '../admin/public/conf/const.php';
//连接数据的连接文件
include '../admin/public/conn.php';
//var_dump($link);
//这是接受板块id
$bkft=isset($_GET['bkft'])?$_GET['bkft']:'';
/* echo $bkft;
exit; */
session_start();
include '../admin/filewzpz/webconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>帖子列表页</title>
<link href="../css/tieziliebiaoye.css" rel="stylesheet">
<link href="../public/tou.css" rel="stylesheet">
<link href="../css/index.css" rel="stylesheet">
</head>

<body>
    <!--这个是最顶部-->
    	<div class="top">
        	<div class="top1"><a href="./index.php">设置首页</a> <a href="#">收藏本站</a></div>
            <div class="top2"><img src="../images/topright.gif"></div>
         </div>
    <!--我是外面的边框-->
    <div class="border">
	<link href="../public/tou.css" rel="stylesheet">
	<link href="../css/header2.css" rel="stylesheet">
<?php
include './public/tou.php';
?>
    <!--我是外面的边框-->
		<div class="border">
   
    <br>
            <!--这个是第五行-->
    <div class="diwuge"><img src="../images/01.gif"><a href="#">>论坛</a><a href="#">>娱乐</a></div>
         
    <!--这个是第六行-->
<form action="./public/tou.php" method="post">
<input type="hidden" name="bkft" value="<?php echo $bkft; ?>">
	<div class="diliuge">
    	<div>
        	<select name="diliugeselect" class= "diliuge2">
            <option value="1" selected>全部主题</option>
            </select>
            	<div class="diliuge3">
                <a href="#">最新</a>
                <a href="#">热门</a>
                <a href="#">热帖</a>
                <a href="#">精华</a>
                </div>
                <div class="diliuge4">
                <input type="checkbox"><a href="#">新窗</a>&nbsp; <a href="#">作者</a>&nbsp;&nbsp;<a href="#">回复/查看</a> &nbsp;<a href="#">最后发表</a>
                </div>
        </div>
		
		
		 
		<?php
		//---------------这个是搜索的地方,以用户名的方式------------//
		if(!empty($_GET['s'])){
			$where="where cate.id=post.cid and user.id=post.uid and title like '%{$_GET['s']}%'"; 
		 } else{
			 $where = "where cate.id=post.cid and user.id=post.uid and cid={$bkft}";
		 }
		
		//---------------这个是搜索的地方,以用户名的方式------------//
		
		 //当前页
		  $page=isset($_GET['page']) ? $_GET['page'] : 1;
		  //var_dump($page);die;
		 //这个要每页先显示的条数
		  $pagerow=3;
		 //n (当前页-1) * 每页显示的条数
		 $offset=($page-1)*$pagerow;
		 $limit= "limit {$offset},{$pagerow}"; 
		 //var_dump($limit);die;
		 ?>
		 
		 
		<?php
		/* $zd1sql="select post.id from cate,post where cate.id=post.cid and cid={$bkft}";
		var_dump($zd1sql);
		exit;
		
		$zdsql="select id,zhiding from post";
		//var_dump($zdsql);
				//exit;
		$zdres=mysqli_query($link,$zdsql);
		if($zdres && mysqli_num_rows($zdres)){
			while($juifo=mysqli_fetch_assoc($zdres)){
				
		//这个是置顶
				if($juifo['zhiding'] == 1){
						$order="order by post.id={$juifo['id']} desc ";
					}else{
						$order="order by post.id desc ";
					}
			}
		} */
		//准备sql语句
		//这个是查询没有用户名的
		//$sql="select cate.id,post.id,post.cid,title,ptime from post,cate where cate.id=post.cid and cid={$bkft} {$limit}";
		//echo $sql;
		//exit;
		
		//$sql="select post.id,post.cid,title,ptime from post,cate {$where} {$limit}";{$order}
		$sql="select post.id,post.cid,title,ptime,user.username,post.kg from post,cate,user {$where} {$limit}";
	/* 	echo $sql;
		exit; */
		//这个是查询有用户名的
		//$sql="select cate.id,post.id,post.cid,post.title,post.ptime,user.username from post,cate,user where cate.id=post.cid and user.id=post.uid and post.cid='{$bkft}' {$limit}" ;
		//$sql="select cate.id,post.id,post.cid,post.title,post.ptime from post,cate where cate.id=post.cid and and post.cid='{$bkft}' {$limit}" ;
		/* echo $sql;
		exit;  */
		//执行sql语句
		$res=mysqli_query($link,$sql);
		if($res && mysqli_num_rows($res)){
			while($uifo=mysqli_fetch_assoc($res)){
		?>
		 <?php
		 //加精 高亮 置顶
		 //准备sql语句
		 $jsql="select id,zhiding,jiajing,gaoliang from post where id={$uifo['id']}";
		 //var_dump($jsql);exit;
		 //执行sql语句
		 $jres=mysqli_query($link,$jsql);
		 if($jres&&mysqli_num_rows($jres)){
			 $juifo=mysqli_fetch_assoc($jres);
			//var_dump($juifo);exit;
		 }
		 
		 ?>
		<!--这里是循环的地方-->
    	<!--主题下面的列表什么的2222222222-->
		  <div class="diliuge1">
			<img src="../images/02.gif">
				<!--<input type="checkbox"><a href="tiezixiangqingye.php?bkid=<?php //echo $uifo['id']; ?>"><?php  //echo $uifo['title']; ?></a>-->
				<!--改动的地方-->
				<input type="checkbox"><a href="tiezixiangqingye.php?bkid=<?php echo $uifo['id']; ?>"><span style="color:<?php if($juifo['gaoliang']==1){echo "red";}else{echo "black";}?>"><?php echo $uifo['title']; ?></span></a> <!--1加精   2不加精--><span style="font-size:10px; color:red;">
				<?php 
					if($juifo['jiajing'] == 1){
						echo '加精 new!!';
					}else{
						echo '';
					}
				
				?>
				
				
				
				</span>
				
				
					<div class="yonghu">
						<div style="margin-top:-28px;"><span style="margin-left:50px;">发表人：<?php echo $uifo['username']; ?></span></br>
						<span>发表的时间:<?php echo $uifo['ptime']; ?></span>
						</div>
					</div>
		  </div>
	  <?php
		 	}
		} else{
			echo '<br>';
			echo '<br>';
			echo '<br>';
			echo '<br>';
			echo '没有查询到结果';
		}
	  ?>
	  <!-- 空白 -->
	  <div id="kongbai">
	  </div>
	  <!--这里是循环的地方-->
	  <!--这个是发帖的图片
          <div  class="diliuge5" ><img  src="../images/03.gif"></div>-->
		 <!--这个是分页的地方--> 
		 
		 
		 <?php
		  //计算上一页
		  $pnext=$page-1;
		  //echo $page;
		 //越界判断 最小值1
		 if($pnext<1){
			 $pnext=1;
			 
		 } 
		 //点击下一页,当前页加一
		 $npage=$page+1;
		 //echo $npage;
		 //做越界判断 下一页不能大于总页数 =ceil(总条数/每页显示的条数)
		 //查找数据库的总页数
		 $fysql="select count(*) as c from post where cid={$bkft}";
		 //$fysql="select count(*) from cate,post where cate.id=post.cid and cid={$bkft}";
		 /* echo $fysql;
		 exit; */
		//echo $fysql;
		
		 $fyres=mysqli_query($link,$fysql);
		 if($fyres&&mysqli_num_rows($fyres)){
			 $fyuifo=mysqli_fetch_assoc($fyres);
			 //var_dump($fyuifo);die;
			
		 }
		 @$total=$fyuifo['c'];
		 //var_dump($total);		 
		 //总页数
		 $zpage=ceil($total/$pagerow);
		// var_dump($zpage);
		 if($npage>$zpage){
			 $npage=$zpage;
		 } 
		 
		 //echo $npage;
		 ?>
		     <div class="fenye">
				<a href="./index.php">返回</a>
				<a href="tieziliebiaoye.php?page=1&bkft=<?php echo $bkft;?>">首页</a>&nbsp;
				<a href="tieziliebiaoye.php?page=<?php	 echo $pnext; ?>&bkft=<?php echo $bkft;?>">上一页</a>&nbsp;
				<a href="tieziliebiaoye.php?page=<?php 	echo $npage; ?>&bkft=<?php echo $bkft;?>">下一页</a>&nbsp;
				<a href="tieziliebiaoye.php?bkft=<?php echo $bkft; ?>&page=<?php echo $zpage;?>">尾页</a>
			 </div> 
   </div>
</form>

	<?php
	//为了有图片
    $sqlp="select pic from post";//查询
	  $resp=mysqli_query($link,$sqlp);
	  if($resp && mysqli_num_rows($resp)){
		 $uifop=mysqli_fetch_assoc($resp);
	  }
  ?>
         <!--这个是第七行-->
	<div class="diqige0">
   		 <div class="diqige">
    			<div class="diqige1">快速发帖</div>
				<!--这里是主要发帖的地方-->
				<form action="./homephp/dotieziliebiaoye.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="oldtp" value="<?php $uifop['pic']; ?>">
				<!--这个接受的板块的id隐藏域-->
				<input type="hidden" name="bkft" value="<?php echo $bkft;?>">
				<!--这里是发帖的标题-->
    				<div class="diqige2"> 发帖的标题：<input required  class="diqige3" type="text"name="diqige2text">还可以输入80个字符  </div>
					<!--这里是附件上传的地方-->
					<br>
					上传的图片：<input type="file" name="pic">
					
					<!--这里是发帖的内容-->
            <div class="textare4">
            	发帖的内容：<textarea  required  class="textare5" name="neirong1" cols="80" rows="10"></textarea> <span class="textare6"><img  src="../images/04.gif"></span>
             </div>
			 <br>
            	 	<div class="textare7">验证码 <input class="textare8" type="text"> <a href="#">换一个</a></div>
             	<div ><input class="textare9" type="submit" value="发表帖子" name="diqigebt"></div>
				
				
				</form>
	    </div>
	</div>  
      <div class="shuipingxian"><hr/></div> 
      <div class="dibu">
      	<div class="dibuleft">Powered by <b>DISCUZ!</b> X3.2<br/>
        &copy; 20001-2013 Comsenz Inc.</div>
        <div class="diburight"><a href="#">站点统计</a> | <a href="#">举报</a> | <a href="#">Archiver </a> | <a href="#">手机版</a> | <a href="#">小黑屋</a> | <a href=""><b>Comsenz Inc.</b></a><br/>
        <span>GMT+8, 2015-7-24 13:08 , Processed in 0.107006 second(s), 13 queries .</span>
      
      		</div>
      </div> 
    </div>
    </div>



</body>
</html>
