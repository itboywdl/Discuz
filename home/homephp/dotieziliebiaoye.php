<?php
//引用数据库的配置文件
include '../../admin/public/conf/const.php';
//引用数据库文件
include '../../admin/public/conn.php';
//引用图片上传
include '../../admin/public/func.inc.php';
//var_dump($link);
session_start();
//发帖的标题
$title=$_POST['diqige2text'];
//发帖的内容
$content=$_POST['neirong1'];
//这个是接受的板块的id
if(isset($_POST['bkft'])){
	$bkft=$_POST['bkft'];
}else{
	$bkft='';
}
//var_dump($bkft);
//exit;
//这个是接受SESSION的用户名
/* if(isset($_POST['yhmz'])){
	$yhm=$_POST['yhmz'];
}else{
	$yhm='';
} */
//$yhm=$_POST['yhmz'];

if(!isset($_SESSION['username'])){
	exit('<script>alert("请您先登录,然后进行发帖！");window.location.href="../tieziliebiaoye.php?bkft='.$bkft.'";</script>');
}

//过滤词汇
  //准备sql语句
   $sqql="select id,ch,thch,kg from glch";
  /*  echo $sqql;
   exit; */
   //执行sql语句
   $ress=mysqli_query($link,$sqql);
   
   //判断
   if($ress && mysqli_num_rows($ress)){
	   while($uifos=mysqli_fetch_assoc($ress)){
		   if($uifos['kg']==1){
			$content=str_replace($uifos['ch'],$uifos['thch'],$content);
		   }
		}  
		
   }
   
$rip = $_SERVER['REMOTE_ADDR']; //::1  127.0.0.1
if($rip == '::1'){
	$rip = '127.0.0.1'; 
} 
   //这里是ip的地方
   //准备sql语句
   $pipsql="select id,bip,kg from jip";
   //执行sql
   $pipres=mysqli_query($link,$pipsql);
   //判断
    if($pipres && mysqli_num_rows($pipres)){
	   while($uifoss=mysqli_fetch_assoc($pipres)){
			//ip
			if($uifoss['kg']==1){
				if($rip==$uifoss['bip']){
					echo'<script>alert("对不起,您的IP以被屏蔽");window.location.href="../tieziliebiaoye.php?bkft='.$bkft.'";</script>';
				}
			}
		}  
	}
$newrip = ip2long($rip);

//图片的地方
//如果没有用户没有修改图片就用默认的
if($_FILES['pic']['error']==4){
	$tp=$_POST['oldtp'];
//如果修改了就保存到upload中
	}else{
	$tp=upload('pic','../tupian');
	//上传后进行缩放 调用缩放函数 把头像 统一都变为 50 50
	//imageUpdateSize('../uploads/'.$tp, 50, 50);
	//unlink('../uploads/'.$tp);
}











   
//发帖的时间
$date=date('Y-m-d H:i:s',time());
//var_dump($date);
//准备sql语句
$sql="insert into post(cid,title,content,ptime,uid,pip,pic) values('{$bkft}','{$title}','{$content}','{$date}','{$_SESSION['id']}','{$newrip}','{$tp}')";
/* echo $sql;
exit; */
//执行sql语句

$res=mysqli_query($link,$sql);
if($res){
	//如果成功的话执行发帖成功
	 echo'<script>alert("发帖成功");window.location.href="../tieziliebiaoye.php?bkft='.$bkft.'";</script>';	
	 //echo $bkft;
	 //exit;
}else{
	//如果失败的话执行发帖失败
	 echo'<script>alert("发帖失败");window.location.href="../tieziliebiaoye.php?bkft='.$bkft.'";</script>';
}




?>