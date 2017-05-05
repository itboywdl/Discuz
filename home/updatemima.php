<?php
//引用数据库配置文件
include '../admin/public/conf/const.php';
//引用数据库的连接文件
include '../admin/public/conn.php';
//var_dump($link);
//exit;
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册页面</title>
<link href="../css/zhuce.css" rel="stylesheet">
</head>

<body>
    <!--这个是最顶部-->
    	<div class="top">
        	<div class="top1"><a href="#">设置首页</a> <a href="#">收藏本站</a></div>
            <div class="top2"><img src="../images/topright.gif"></div>
         </div>
	
    <!--我是外面的边框-->
    <div class="border">
	
   <!--这个是第二行-->
		<div class="dierge">
        	<div class="dierge1"><img src="../images/logo.png"></div>
        </div>
    <!--这个是第三行-->
    <div class="disange">
    	<div class="disange1"><img src="../images/luntan.gif"></div>
        	<div class="disange2">
            <select name="kjdh">
            	<option value="1">快捷导航</option>
            </select>
       	</div>
    </div>    
    <!--这个是第四行-->
    <div class="disige">
	
	
    <form>
    	<div>
        <input class="disige1"  placeholder="请输入搜索的内容！" type="text" name="disigetext1"><select name="disigeselect" class="disige2"><option value="1" selected >帖子</option></select><div class="disige3"><input   type="image" src="../images/quan.gif"></div>
        <div class="disige4"><a href="#">热搜</a> <a href="#">活动</a> <a href="#">交友</a> <a href="#">娱乐</a></div> 
    	 </div>
    </form>
    </div>
    
    
    
	<!--中间的部分-->
	<div class="zhongjian">	
			<!--中间的部分的导航栏-->
		<div class="zhongjian1">
			<div class="zhongjianleft"><b>修改密码</b>
			</div>
			<div class="zhongjianright">
			<div class="zhongjianright1"><a href="./index.php">已有账号？</a></div>
			<div class="zhongjianright2"><a href="./index.php">现在登录</a></div>
			</div>
		</div>
		
		<!--中间的第二部分-->
		<div class="zhongjian2">
			<form action="./homephp/doupdate.php" method="post">
					<!--中间的第二部分用户名-->
					<div class="zhongjian21"><p><sup style="color:red">*</sup>用户名：<input type="text" required autofocus name="username" placeholder="请您输入用户名！" autofocus >&nbsp;<span class="zhongjian22"><sup style="">*</sup><b>用户名不能小于3个字符</b></span></p>
					</div>
					<!--中间的第二部分密码-->
					<div class="zhongjian21"><p><sup style="color:red">*</sup>新密码：<span><input type="password" required name="pass" placeholder="请您输入密码！" >&nbsp;<span class="zhongjian22"></span></p>
					</div>
					<!--中间的第二部分确认密码-->
					<div class="zhongjian21"><p><span class="a1"><sup style="color:red">*</sup>确认密码：</span><input type="password" required name="repass" placeholder="请您输入确认密码！" >&nbsp;<span class="zhongjian22"></span></p>
					</div>
					<!--中间的第二部分验证码
					<div class="zhongjian231">
					<p><sup style="color:red">*</sup>验证码: <input type="text" name="yzm">&nbsp;<span class=	"zhongjian22"></span><span class="huanyige" name="huanyige"><a href="#">换一个</a><br></span>
						<span class="yanzhengma">
					<span>输入下图中的字符<br><span class="yanzhengma1">这是变化的图片</span></span>
						</span>
					</div>-->
					<div class="tijiao"><input type="image" src="../images/16.gif" value="提交"></div>	
			</form>
		</div>
			
	</div>
<!--这个是第七行-->
     <?php  
		include './public/footer.php';
	 ?>
      </div>   
    </div> 
    </div>
	<!--这个最外面的框-->
	</div>
</body>
</html>
