<?php
//php连接Mysqli步骤  DDL
//修改配置文件
//创建库 create database db_name;
//创建表 use db_name; create table user();  开发时可以保留一份 导出
//向表中写入默认数据
//mysqldump -u root -p db_name > 路径 文件 txt
//C:\Users\Administrator>mysqldump -u root -p discuz > D:/wamp/www/176/20170210/project/install/mysql.log
//Enter password:

//var_dump($_POST);
//拼接数据库配置文件
$str = "<?php\n";
foreach($_POST as $k => $v){
	if($k == 'adminuser'){
		break;
	}
	$str .= "const {$k} = '{$v}';\n";
}

if(file_put_contents('../admin/public/conf/const.php', $str)){
	//修改配置成功  //包含配置文件
	include '../admin/public/conf/const.php';
	$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASS) or exit('数据库连接失败');
	mysqli_set_charset($link, 'utf8');
	//创建库
	$dbsql = "create database ".DB_NAME;
	if(mysqli_query($link, $dbsql)){
		//选择库
		mysqli_select_db($link, DB_NAME);
		//创建表
		$sqlstr = file_get_contents('./mysql.log');
		$sqlarr = explode(';', $sqlstr);
		array_pop($sqlarr);
		/* var_dump($sqlarr);
		exit; */
		foreach($sqlarr as $k => $v){
			if(mysqli_query($link, $v)){
				echo '第'.($k+1).'个表创建成功<br>';
			}else{
				echo '第'.($k+1).'个表创建失败<br>';
			}
		}
		$pass = md5($_POST['adminpwd']);
		$usersql = "insert into user(username,password,qx) values('{$_POST['adminuser']}','{$pass}','2')";
		mysqli_query($link, $usersql);
		//安装成功 跳转到首页  生成一个标识
		echo '<script>alert("安装成功 跳转到首页");window.location.href="../home/index.php";</script>';
		file_put_contents('./install.lock','');
	}else{
		echo '创建库失败';
	}
	
}else{
	//修改配置失败
	echo '配置修改失败';
}