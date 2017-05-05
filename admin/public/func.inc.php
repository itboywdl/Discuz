<?php
/*
*功能：上传
*参数：
*string $fname 表单项名称
*int $size 上传文件大小 默认2M以内  注意需要转成字节
*array $allowtype 上传允许类型 默认值jpg|png|gif
*string $path 上传文件存放路径  默认值当前下的uploads目录下
*返回值:
*string $filename 上传文件名称
*/

function upload($fname, $path, $size = 2097152, $allowtype = array('image/jpeg','image/png','image/gif'))
{
	$file = $_FILES[$fname];
	//1.错误号判断
	switch($file['error']){
		case 1:
			echo '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
			break;
		case 2:
			echo '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
			break;
		case 3:
			echo '文件只有部分被上传';
			break;
		case 4:
			echo '没有文件被上传';
			break;
		case 6:
			echo '找不到临时文件夹';
			break;
		case 7:
			echo '没有写入失败';
			break;
	}


	//2.上传文件大小必须2M以内  >
	if($file['size'] > $size){
		exit('请上传2M以内大小图像');
	}

	//3.上传文件类型必须图像 (jpg|png|gif)  遍历  in_array
	if(!in_array($file['type'], $allowtype)){
		exit('请上传jpg|png|gif此类型的图像');
	}

	//4.上传文件存放目录
	if(!file_exists($path)){
		mkdir($path, 0777, true);
	}
	//5.随机文件名
	$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
	$filename = time().mt_rand(1000,9999).'.'.$ext;

	//6.执行上传
	if(is_uploaded_file($file['tmp_name'])){
		move_uploaded_file($file['tmp_name'], rtrim($path. '/').'/'.$filename);
	}else{
		exit('请使用HTTP POST方式进行上传');
	}
	return $filename;
}

/**
*功能：验证码
*参数：
*验证宽度 int $width 默认值  120
*验证高度 int $height 默认值 40
*验证字符个数 int $len 默认值 4
*验证码的类型：int $type 1返回字母 2返回数字 3返回数字+字母
*返回值：随机字符 string $str;
*/
function yzm($width = 120, $height = 40, $len = 4, $type = 1)
{
	//1.创建画布
	$res = imagecreatetruecolor($width, $height);

	//2.准备颜色
	$shen = imagecolorallocate($res, rand(0, 120), rand(0, 100), rand(0, 130));
	$qian = imagecolorallocate($res, rand(130, 255), rand(140,200), rand(150,255));

	//3.开始绘画
	//画一个填充矩形
	imagefilledrectangle($res, 0, 0, $width, $height, $qian);

	//随机4个字符
	//$str = 'abcd';
	switch($type){
		case 1:
			$str = implode('', array_rand(array_flip(range('a', 'z')), $len));
			break;
		case 2:
			$str = implode('', array_rand(array_flip(range(0, 9)), $len));
			break;
		case 3:
			$str = implode('', array_rand(array_flip(array_merge(range('a', 'z'), range(0,9), range('A','Z'))), $len));
			break;
	}
	
	//画字符 第一个字符左下角坐标点
	for($i = 0;$i < $len;$i++){
		imagettftext($res, 18, rand(-30, 30), rand($i*($width/$len), (($i+1)*($width/$len))-6), rand(16, $height), $shen, './simkai.ttf', $str{$i});
	}

	//画干扰元素
	//画点
	for($i = 1;$i <= 200;$i++){
		imagesetpixel($res, rand(0,$width), rand(0,$height), $shen);
	}
	//画线
	for($i = 1;$i <= 5;$i++){
		imageline($res, rand(0,$width), rand(0,$height), rand(0,$width), rand(0,$height), $shen);
	}
	//4.告诉浏览器这是一个图像
	header('Content-type:image/jpeg');

	//5.将图像输出给浏览器
	imagejpeg($res);

	//6.释放画布资源
	imagedestroy($res);
	
	return $str;
}

/**
 * 等比缩放函数（以保存的方式实现）
 * @param string $picname 被缩放的处理图片源
 * @param int $maxx 缩放后图片的最大宽度
 * @param int $maxy 缩放后图片的最大高度
 * @param string $pre 缩放后图片名的前缀名
 * @return String 返回后的图片名称(带路径)，如a.jpg=>s_a.jpg
 */
function imageUpdateSize($picname,$maxx=100,$maxy=100,$pre="s_"){
	$info = getimageSize($picname); //获取图片的基本信息
	
	$w = $info[0];//获取宽度
	$h = $info[1];//获取高度
	
	//获取图片的类型并为此创建对应图片资源	
	switch($info[2]){
		case 1: //gif
			$im = imagecreatefromgif($picname);
			break;
		case 2: //jpg
			$im = imagecreatefromjpeg($picname);
			break;
		case 3: //png
			$im = imagecreatefrompng($picname);
			break;
		default:
			die("图片类型错误！");
	}
	
	//计算缩放比例
	if(($maxx/$w)>($maxy/$h)){
		$b = $maxy/$h;
	}else{
		$b = $maxx/$w;
	}
	
	//计算出缩放后的尺寸
	$nw = floor($w*$b);
	$nh = floor($h*$b);
	
	//创建一个新的图像源(目标图像)
	$nim = imagecreatetruecolor($nw,$nh);
		
	//执行等比缩放
	imagecopyresampled($nim,$im,0,0,0,0,$nw,$nh,$w,$h);
	
	//输出图像（根据源图像的类型，输出为对应的类型）
	$picinfo = pathinfo($picname);//解析源图像的名字和路径信息
	$newpicname= $picinfo["dirname"]."/".$pre.$picinfo["basename"];
	switch($info[2]){
		case 1:
			imagegif($nim,$newpicname);
			break;
		case 2:
			imagejpeg($nim,$newpicname);
			break;
		case 3:
			imagepng($nim,$newpicname);
			break;
	}
	//释放图片资源
	imagedestroy($im);
	imagedestroy($nim);
	//返回结果
	return $newpicname;
}

?>