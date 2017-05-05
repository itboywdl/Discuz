<?php
if(!file_exists('../install/install.lock')){
	echo '<script>alert("请先安装");window.location.href="../install/install1.php";</script>';
}
session_start();
//引用数据库的配置文件
include '../admin/public/conf/const.php';
//引用数据的文件
include '../admin/public/conn.php';
//引用数据库的文件配置文件
include '../admin/filewzpz/webconfig.php';
?>

<?php
if(WZ_KG==2){
	echo '<script>alert("不好意思系统正在升级!");window.location.href="./weihu.php";</script>';
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="keywords" content="<?php echo WZ_CONST; ?>">

<title><?php echo WZ_NAME; ?></title>

<link href="../public/tou.css" rel="stylesheet">
<link href="../css/header2.css" rel="stylesheet">
<link href="../css/index.css" rel="stylesheet">
</head>

<body>
    <!--这个是最顶部-->
    	<div class="top">
        	<div class="top1"><a href="./index.php">设置首页</a> <a href="#">收藏本站</a></div>
            <div class="top2"><img src="../images/topright.gif"></div>
         </div>

         
    <!--这个是整体的边框-->
    <div id="border">
	
	<!--这个是引用的是文件头-->
    <?php  
	include './public/tou.php';
	?>
            <div class="centera6">
            	<div class="centera7"> <img src="../images/01.gif"><img src="../images/pt_item.png"> <a href="#">论坛</a><br/>
                	<img src="../images/chart.png"> 今日:0 | 昨日:0 | 帖子:0 | 会员:1 | 欢迎新会员:
					<?php if(isset($_SESSION['username']))echo $_SESSION['username']; ?>
                </div>
		  <div class="centera8">
				<!--为了好看加一个框-->
				<div class="kuang">
				   <?php
					   //准备sql语句
					   $sql="select id,pname from part";
					   //执行sql语句
					   $res=mysqli_query($link,$sql);
					   if($res && mysqli_num_rows($res)){
						   while($puifo=mysqli_fetch_assoc($res)){
					   ?>
					<div class="centera9">
						<?php  echo $puifo['pname']; ?>
					</div>
				<?php
				$sql1="select id,pid,cname from cate where pid={$puifo['id']}";
				$ress=mysqli_query($link,$sql1);
				 if($ress && mysqli_num_rows($ress)){
					while($puifo1=mysqli_fetch_assoc($ress)){
						?>
						<div class="centera10"><img src="../images/forum_new.gif">
						<!--这个是分块下的发帖的地方-->
							&nbsp;<b>
							<a href="tieziliebiaoye.php?bkft=<?php echo $puifo1['id']; ?>"><?php echo $puifo1['cname'];?></a> </b>
						</div>
				<?php
					}
				 } else{
					 echo '没有找到';
				 } 
				?>			
				<!--为了好看加一个框-->
           
            <div class="centera11">
			<?php
			   }
		   }else{
			   echo '不好意思没有查询到！';
		   }
		   ?>
		   <!--这个是为了好看，然后做友情链接-->
				<div class="yq">	
				  <div class="centera12"><img src="../images/15.gif"><div class="centera13"><b>官方论坛</b><br/>提供最新Discuz!产品新闻、软件下载与技术交流</div>
                  <div class="centera14">..................................................................................................................................................................</div>
                  <div class="centera15">
                  <ul>
				   <?php
				  $sql="select id,title,url,pic,xq from yqlj";
				  $res=mysqli_query($link,$sql);
				  if($res && mysqli_num_rows($res)){
				  while($uifo=mysqli_fetch_assoc($res)){
				  ?>
                    <li>&nbsp;&nbsp;<b><a href="./yqlj.php?ly=<?php echo $uifo['id']; ?>"><?php echo $uifo['title'];  ?></a></b></li>
					<?php
				  	}
				  }else{
					  echo '不好意思没有找到！';
				  }
				  ?>					
                  </ul>
                  </div>
		<!--这个是为了好看，然后做友情链接-->
				</div>
			</div>
    <div class="centera16"><hr/></div>
    <div class="diqige0">
    </div>
<div>
<?php

include './public/footer.php';

?>
</html>
    
    
    
    
    
    
    
    
    
    
    



