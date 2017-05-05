	<?php
			@session_start();
			if(!isset($_SESSION['username'])){
		?>
		<!--这个是第二行的边框-->
         <div class="dierhang">
        	<!--这个是第二行的左边框-->
    	<div class="diergeleft">
		
        <img width="100" height="70" src="../admin/uploads/<?php echo WZ_LOGO; ?>">
        </div>
    		<!--这个是第二行的右边框-->
        
    	<div class="diergeright">
		
		<!--这是form表单中的登录-->
			<form method="post" action="./doindex.php">
			<!--用户名-->
        	<div class="diergeright1">
			<select>
				<option selected value="1">用户名</option></select>
				<input type="text" required autofocus name="name">
				<input type="checkbox">
        	自动登录 &nbsp; &nbsp;<a href="./updatemima.php">找回密码</a><br/>
        	<br/>
			<!--密码框-->
			<div class="diergeright2">密码：&nbsp;<input type="password" required name="paw"> <input  class="diergeright3" type="submit" value="登录"><a class="w" href="./zhuce.php">立即注册</a><div>
            </div>
         </div><div class="diergeright4">|</div>
         </div>
		 </form>
		 <!--这是form表单中的登录-->
    </div>
    </div>             
                                    
 <div class="zhongjian">
     <div class="centera">
       <div><img src="../images/luntan.gif"></div>
             <div class="centera1"><select>
                  <option>快捷导航<option>
                       </select>
         </div>                 
       </div>
       
			<div class="centera2">
            <form>
            <div class="centera3">
            	<input  class="centera21"  placeholder="请输入搜索内容！" type="text"><select>
                <option>帖子</option>
                </select>
                 </div>
                <div class="centera4"><input type="image" src="../images/quan.gif"></div>
                <div class="centera5"><a href="#">热搜：</a> <a href="#">交友</a> <a href="#">活动</a></div>
            </form>
            </div>
			
<?php
}else{
?>

			<!--头部 start-->
			<div id="header">
				<!--头部-top-->
				
				<div class="top" style="color:white">
					
					<div class=""style="color:white">
						<div class="discuz">
						
						<img width="100" height="70" src="../admin/uploads/<?php echo WZ_LOGO; ?>" >
					</div>
					<div class="top-right">
						<ul>
							<li><a href=""><?php echo $_SESSION['username'];  ?>
							在线</a></li>
							<li><a href="./gerenzhongxin.php?uid=<?php echo $_SESSION['id']; ?>">我的</a></li>
							<li><a href="">设置</a></li>
							<li><a href="">消息</a></li>
							<li><a href="">提醒</a></li>
							<li><a href="">模块管理</a></li>
							<li><a href="./public/qxpd.php">管理中心</a></li>
							<li><a href="./unset.php">退出</a></li>
						</ul>
					</div>
					<div class="top2">
						<ul>
							<li><a href="">用户组：管理员</a></li>
							<li><a href="">积分：5</a></li>
						</ul>
					</div>
					<div class="top3">
						<img src="../admin/uploads/<?php echo $_SESSION['pic']; ?>" style="width:65px;height:65px;">
					</div>
					</div>
				<!--头部-top-->
				</div>
				
			</div>
			<div class="zhongjian">
     <div class="centera">
       <div><img src="../images/luntan.gif"></div>
             <div class="centera1"><select>
                  <option>快捷导航<option>
                       </select>
         </div>                 
       </div>
       
			<div class="centera2">
            <form action="../home/tieziliebiaoye.php" method="get">
            <div class="centera3">
            	<input  name="s" class="centera21"  placeholder="请输入搜索内容！" type="text"><select>
                <option>帖子</option>
                </select>
                 </div>
                <div class="centera4"><input type="image" src="../images/quan.gif"></div>
                <div class="centera5"><a href="#">热搜：</a> <a href="#">交友</a> <a href="#">活动</a></div>
            </form>
            </div>
			<!--头部 end-->
			<?php
			}
			?>