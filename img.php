<?php
//开启session
session_start();
//创建真彩色图片
$image=imagecreatetruecolor(120, 55);
//设置验证码的背景色
$bgcolor=imagecolorallocate($image,rand(200,255), rand(200,255), rand(200,255));
//为验证码添加背景色
imagefill($image, 0, 0, $bgcolor);
//$black=imagecolorallocate($image, 51, 51, 51);
$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$temp=NULL;
//循环出4个字符acd8
for ($i=0;$i<4;$i++){
	$temp.=$str[rand(0, strlen($str)-1)];
}
//再把4个字符循环写入到图片中
for($i=0;$i<4;$i++){
	$x=floor(75/4)*$i+8;
	$y=rand(30,40);
	$fontSize=rand(10,26);
	$angle=rand(-30,30);
	$fontColor=imagecolorallocate($image, rand(0,100),rand(0,100), rand(0,100));
	imagettftext($image, $fontSize, $angle, $x, $y, $fontColor, "georgia.ttf", $temp[$i]);
}
//把验证码写入session中
$_SESSION['captcha']=$temp;
//输出png格式的验证码
imagepng($image);
?>