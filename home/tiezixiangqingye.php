<?php
//网站配置的文件
include '../admin/filewzpz/webconfig.php';
//连接数据库的配置文件
include '../admin/public/conf/const.php';
//连接数据库的链接文件
include '../admin/public/conn.php';
//var_dump($link);
//接收发帖的id
if(isset($_GET['bkid'])){
	$bkid=$_GET['bkid'];
}else{
	$bkid='';
}
/* echo $bkid; */
/* exit; */
session_start();
/* var_dump($_SESSION['id']);
exit; */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>帖子详情页</title>
<link href="../css/tiezixiangqingye.css" rel="stylesheet">
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

 <!--这个是第六行-->
  <div class="diliuge">
  	<div>
		<div class="fatie">
		<!--可以优化-->
			<a href="tieziliebiaoye.php"><b>发帖页面</b></a>
			<!--可以优化-->
		</div>
		<form action="" method="post">
			<input class="diliuge2" type="button" value="回复" name="diliugebt">
		</form>
       <div><a  href="#" class="diliuge3">返回列表</a></div>
    </div>
  </div>  
     <hr/>
      <!--这个是第七行-->
     <div class="diliuge4">
     	<ul>
        	<li><a href="#">删除主题</a></li>
            <li>|</li>
            <li><a href="#">升降</a></li>
             <li>|</li>
            <li><a href="#">置顶</a></li>
             <li>|</li>
            <li><a href="#">直播</a></li>
             <li>|</li>
            <li><a href="#">高亮</a></li>
             <li>|</li>
            <li><a href="#">精华</a></li>
             <li>|</li>
            <li><a href="#">图章</a></li>
             <li>|</li>
            <li><a href="#">图标</a></li>
            <li>|</li>
            <li><a href="#">关闭</a></li>
            <li>|</li>
            <li><a href="#">移动</a></li>
            <li>|</li>
        	 <li><a href="#">分类</a></li>
               <li>|</li>
              <li><a href="#">复制</a></li>
            <li>|</li>
             <li><a href="#">合并</a></li>
             <li>|</li>
             <li><a href="#">分割</a></li>
             <li>|</li>
             <li><a href="#">修复</a></li>
             <li>|</li>
              <li><a href="#">警告</a></li>
              <li>|</li>
              <li><a href="#">屏蔽</a></li>
              <li>|</li>
              <li><a href="#">标签</a></li>
        </ul>
     </div>
     <br/><br/>
 		<!--这个有错误必须调-->		   
	<?php
	//准备sql语句
	//$sql="select title,content from post where id='{$bkid}'";
	$sql="select post.id,user.username,user.pic,title,content,post.kg from post,user where user.id=post.uid and post.id='{$bkid}'";
	/* var_dump($sql);
	exit; */
	$res=mysqli_query($link,$sql);
	if($res&&mysqli_num_rows($res)){
	while($uifo=mysqli_fetch_assoc($res)){
	?>    
     
         <!--这个是八行-->
 <div class="dibahang">
 
 	<div class="dibahangleft">
    	<div class="dibahangleft1">查看:0 | 回复:0 <br/><img src="../images/07.gif"></div>
        
        <div class="dibahangleft2"><b> &nbsp;<?php  echo $uifo['username']; ?></b></div>
        <div class="dibahangleft3">
        	<img width=140px height=130px src="../admin/uploads/<?php echo $uifo['pic']; ?>">
        </div>
        	<div class="dibahangleft4">
            	<table  cellpadding="0" cellspacing="0" align="center" width="130px">
                	<tr>
                    	<td>1</td>
                        <td rowspan="2">|</td>
                        <td>1</td>
                        <td  rowspan="2">|</td>
                        <td>5</td>
                    </tr>
                    <tr>
                    	<td>主题</td>
                        <td>帖子</td>
                        <td>积分</td>
                    </tr>
                </table>
            </div>
            <div class="dibahangleft5">管理员<?php echo $uifo['username']; ?><br/><img src="../images/09.gif"></br>积分&nbsp;&nbsp;5 <br/><br/>IP 编辑 禁止 帖子 清理</div>
    </div>
 				 <!--这个是右边的-->
<div class="dibahangright">
    <div class="dibahangright1">
		<div class="dibahangright2">&nbsp;&nbsp;标题是：<?php echo $uifo['title']; ?>
		<sub><a href="">[复制链接]</a></sub>
			<span style="margin-left:500px; color:red;">楼主</span>
			<img src="../images/10.gif"><br/>
				<div class="dibahangright3"></div>
				<div>
					<div class="dibahangright4"> <img src="../images/11.gif"> 发表于 刚刚 | 只看该作者<img src="../images/12.gif">
						<div class="dibahangright5">楼梯 电梯直达<input class="dibahangright6" type="text" name="dibahangright5text"><input type="button" value="跳转"><br/>
						</div>
						<hr>
					</div>
						<div class="dibahangright8">
						<!--这里是文件下载-->
							是否要下载图片：<a href="./homephp/xiazai.php"><?php echo $uifo['pic'];?></a>
							<!--<div class="dibahangright7">内容是：<?php echo  $uifo['content']; ?></div>-->
							<div class="dibahangright7">内容是：<?php echo ($uifo['kg'] == 1) ? $uifo['content'] : '内容已经被屏蔽'; ?></div>
						</div>         
				</div>
		</div>
	</div>
</div>
<?php
	 }
		}
		
?>	
<br><br>

<!--这里千万不要乱动-->

<?php
$d=0;
//这里是发帖和回帖相关联
 //准备sql语句
 $sql="select post.uid,post.title,reply.content,reply.ptime,reply.id from reply,post where post.id=reply.pid and pid={$bkid}  order by reply.ptime";
 
 //$sql="select post.uid,post.id,post.title,reply.content,reply.ptime from reply,post,user where post.id=reply.pid and user.id=post.uid and pid={$bkid}";
 
/* var_dump($sql);
exit;   */
//执行sql语句
$res=mysqli_query($link,$sql);
if($res&&mysqli_num_rows($res)){
	while($uifo=mysqli_fetch_assoc($res)){  
	 //准备sql 语句 用户ID和回帖的UID关联 
	 $hsql = "select user.username,user.pic,user.id,reply.ptime from reply,user where reply.uid=user.id and reply.id={$uifo['id']}";
	/*  var_dump($hsql);
	 exit; */
	$hres=mysqli_query($link,$hsql);
	if($hres&&mysqli_num_rows($res)){
		$huifo = mysqli_fetch_assoc($hres);
		$d++;
	}
?>

<!--这个是重点-->
<div class="dibahang">

 	<div class="dibahangleft">
    	<div class="dibahangleft1">查看:0 | 回复:0 <br/><img src="../images/07.gif"></div>
        
        <div class="dibahangleft2"><b> &nbsp;<?php echo $huifo['username'];?></b></div>
        <div class="dibahangleft3">
        	<img width=140px height=130px src="../admin/uploads/<?php echo $huifo['pic']; ?>">
        </div>
        	<div class="dibahangleft4">
            	<table  cellpadding="0" cellspacing="0" align="center" width="130px">
                	<tr>
                    	<td>1</td>
                        <td rowspan="2">|</td>
                        <td>1</td>
                        <td  rowspan="2">|</td>
                        <td>5</td>
                    </tr>
                    <tr>
                    	<td>主题</td>
                        <td>帖子</td>
                        <td>积分</td>
                    </tr>
                </table>
            </div>
            <div class="dibahangleft5">管理员<?php echo $uifo['uid']; ?><br/><img src="../images/09.gif"></br>积分&nbsp;&nbsp;5 <br/><br/>IP 编辑 禁止 帖子 清理</div>
    </div>
 				 <!--这个是右边的-->
<div class="dibahangright">
    <div class="dibahangright1">
		<div class="dibahangright2">&nbsp;&nbsp;标题是：<?php echo $uifo['title']; ?>
		<sub style="margin-right:500px;"><a href="">[复制链接]</a></sub>
							<?php
	//判断楼层
		
			if($d<3){
				switch($d){
					case 1:
						echo "沙发";
						break;
					case 2:
						echo "板凳";
						break;
				}
			}else{
				echo '第'.$d.'楼';
			}
		?>
			
			<img src="../images/10.gif"><br/>
				<div class="dibahangright3"></div>
				<div>
					<div class="dibahangright4"> <img src="../images/11.gif"> 发表于 <?php echo $huifo['ptime']; ?> | 只看该作者<img src="../images/12.gif">
						<div class="dibahangright5">楼梯 电梯直达<input class="dibahangright6" type="text" name="dibahangright5text"><input type="button" value="跳转"><br/>
						</div>
						<hr>
					</div>
						<div class="dibahangright8">
							<div class="dibahangright7">内容是：<?php echo $uifo['content']; ?></div>
						</div>         
				</div>
		</div>
	</div>
</div>
</div>
<br><br>
<?php
 	}
}  
?>




<!--这个是重点-->
		
		
		
		
<div class="diliuge4">
    <ul>
        <li><a href="#">删除主题</a></li>
        <li>|</li>
        <li><a href="#">升降</a></li>
        <li>|</li>
        <li><a href="#">置顶</a></li>
        <li>|</li>
        <li><a href="#">直播</a></li>
        <li>|</li>
        <li><a href="#">高亮</a></li>
        <li>|</li>
        <li><a href="#">精华</a></li>
        <li>|</li>
        <li><a href="#">图章</a></li>
        <li>|</li>
        <li><a href="#">图标</a></li>
        <li>|</li>
        <li><a href="#">关闭</a></li>
        <li>|</li>
        <li><a href="#">移动</a></li>
        <li>|</li>
        <li><a href="#">分类</a></li>
        <li>|</li>
        <li><a href="#">复制</a></li>
        <li>|</li>
        <li><a href="#">合并</a></li>
        <li>|</li>
        <li><a href="#">分割</a></li>
        <li>|</li>
        <li><a href="#">修复</a></li>
        <li>|</li>
        <li><a href="#">警告</a></li>
        <li>|</li>
        <li><a href="#">屏蔽</a></li>
        <li>|</li>
        <li><a href="#">标签</a></li>
    </ul>
</div>
<br>
<hr>

  <div class="diliuge">
  	<div>
		<div class="fatie">
		<!--可以优化-->
			<a href="tieziliebiaoye.php?bkft='.$bkft.'"><b>发帖页面</b></a>
			<!--可以优化-->
		</div>
		<form action="" method="post">
			<input class="diliuge2" type="button" value="回复" name="diliugebt">
		</form>
       <div><a  href="#" class="diliuge3">返回列表</a></div>
    </div>
  </div>  
  <br>
		<!--这里可以改-->
		<!--这里是有$_SESSION的值-->
		<?php
		if(isset($_SESSION['pic'])){
		?>
	<div class="dibahanglefthao">
        <div class="dibahangleft3">
        	<img width="150" height="150" src="../admin/uploads/<?php echo $_SESSION['pic']; ?>">
        </div>
        	<div class="dibahangleft4">
            </div>
    </div>
		
		    <!--这个是第七行-->
	<div class="diqige0">
   		 <div class="diqige">
				<!--这里是主要回帖的地方-->
				<form action="./homephp/dotiezixiangqingye.php" method="post">
				<!--这个接受的板块的id隐藏域-->
				<input type="hidden" name="bkid" value="<?php echo $bkid; ?>">
				<!--这个接受的session的值,用户的值-->
				<input type="hidden" name="uid" value="<?php echo $_SESSION['id']; ?>">
					<!--这里是发帖的内容-->
            <div class="textare4">
            	<textarea class="textare5" name="neirong1" cols="70" rows="10"></textarea> <span class="textare6"><img  src="../images/04.gif"></span>
             </div>
            	 	<div class="textare7">验证码 <input class="textare8" type="text"> <a href="#">换一个</a></div>
             	<div ><input class="textare9" type="submit" value="回复帖子" name="diqigebt"></div>
				</form>
	   		 </div>
	</div>  
		
	<?php
	
		}else{
			
			?>
	
	
	<br><br>
	<!--这里是没有$_SESSION的值-->
		<!--这里可以改-->
	<div class="dibahanglefthao">
        <div class="dibahangleft3">
        	<img width="150" height="150" src="../images/08.gif">
        </div>
        	<div class="dibahangleft4">
            </div>
    </div>
	
		    <!--这个是第七行-->
	<div class="diqige0">
   		 <div class="diqige">
				<!--这里是主要回帖的地方-->
				<form action="./homephp/dotiezixiangqingye.php" method="post">
				<!--这个接受的板块的id隐藏域-->
				<input type="hidden" name="bkid" value="<?php echo $bkid; ?>">
				<!--这个接受的session的值,用户的值-->
					<!--这里是发帖的内容-->
            <div class="textare4">
            	<textarea class="textare5" name="neirong1" cols="70" rows="10"></textarea> <span class="textare6"><img  src="../images/04.gif"></span>
             </div>
            	 	<div class="textare7">验证码 <input class="textare8" type="text"> <a href="#">换一个</a></div>
             	<div ><input class="textare9" type="submit" value="回复帖子" name="diqigebt"></div>
				</form>
	   		 </div>
	</div>  
	
	<?php
		}
	?>
	
	
	
	
	
	
	
	
	
	
	
<!--这个是第七行-->

      <div class="shuipingxian"><hr/></div> 
	  <?php
	  include './public/footer.php';
	  ?>
      </div>   
    </div> 
    </div>
</body>
</html>