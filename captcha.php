<?php
session_start();
$image=imagecreatetruecolor(120, 50);
$bgColor=imagecolorallocate($image, rand(200,255), rand(200,255), rand(200,255));
imagefill($image, 0,0, $bgColor);
$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$temp=null;
//把每次循环的字符连接起来
for($i=0;$i<4;$i++){
	//$temp=$temp.$str[rand(0,strlen($str)-1)];
	$temp.=$str[rand(0,strlen($str)-1)];
}
//把验证码保存到session中;
$_SESSION['captcha']=$temp;
//把$temp中的字符分别写入到图片中
//每个字符都是独立的；
for($j=0;$j<4;$j++){
	$textColor=imagecolorallocate($image, rand(0,150), rand(0,150), rand(0,150));
	$size=rand(10,25);
	$angle=rand(-10,10);
	//公式:让4个字符较平均的在x轴上分布;
	$x=floor(120/4)*$j+8;
	$y=rand(30,45);
	$fontfile="georgiab.ttf";
	imagettftext($image,$size,$angle,$x,$y, $textColor,$fontfile,$temp[$j]);
}
imagepng($image);
?>