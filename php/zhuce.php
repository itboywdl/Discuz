<?php
/*现在出错的情况是只能显示成功，如果密码错了，他不会显示只会出现用户名注册成功*/





//这里是用户名的不正确的地方
$uname =$_POST['zhongjian2text'];
if($uname==""){
	echo '<script>alert("请您输入要注册的用户名,不能为空！");window.location.href="../zhuce.html";</script>';
}
//必须输入3个字符以上才可以
$pattern='/^\w{3,}$/';
	if(preg_match($pattern, $uname, $match)){
		echo'<script>alert("您已经成功注册了一个新的用户名！");window.location.href="../zhuce.html";</script>';
		echo '';
	}else{
		echo '<script>alert("请您输入正确的填写用户名！");window.location.href="../zhuce.html";</script>';
	}

//这里是确认密码的地方
$cpass=$_POST['querenmima'];
$pas = $_POST['mima'];
if($cpass==$pas){
	echo '<script>alert("666666");window.location.href="../zhuce.html";</script>';
}else{
	echo '<script>alert("请您输入要输入的密码和确认密码一致！");window.location.href="../zhuce.html";</script>';
}



//这里是密码不正确的地方
$pas=$_POST['mima'];
if($pas==""){
	echo '<script>alert("请您输入要注册的密码！");window.location.href="../zhuce.html";</script>';
}
//密码必须是1-10位的由数字，字母，下划线组成
$pattern='/^\w{1,10}$/';
	if(preg_match($pattern, $pas, $match)){
		//如果加上这句就会只显示这一句话，以下就会被覆盖，就算2次密码输入错误也不会显示！
		/*echo '<script>alert("您已经成功注册了一个新的密码！");window.location.href="../zhuce.html";</script>';
		*/
		echo '';
	}else{
		echo '<script>alert("请您输入正确的填写用户名！");window.location.href="../zhuce.html";</script>';
	}
	
	


//这里是有邮箱的地方
$email=$_POST['Email'];
if($email==""){
	echo '<script>alert("请您输入要注册的邮箱！");window.location.href="../zhuce.html";</script>';
}
//这里是邮箱的正则的验证的地方
$pattern='/^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+(\.[0-9a-zA-Z_-]+){1,3}$/';
	if(preg_match($pattern, $email, $match)){
		echo '<script>alert("您已经成功注册了一个新的邮箱！");window.location.href="../zhuce.html";</script>';
	}else{
		echo '<script>alert("请您输入正确的填写新的邮箱！");window.location.href="../zhuce.html";</script>';
	}



?>