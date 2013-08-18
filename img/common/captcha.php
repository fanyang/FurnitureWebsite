<?php

//生成随机数-》保存在SESSION中-》创建图片-》随机数写进图片-》输出图片
session_start();

$chars='ABCDEFGHIJKMNPQRTWXYabcdefghijkmnpqrtwxy346789';
$rand = substr(str_shuffle($chars), 0, 4);

$_SESSION['captcha']=$rand;

// 新建一个真彩色图像  x就是宽 ，y就是高
$image = imagecreate(90, 35);
 
//设置颜色
//为一幅图像分配颜色(调色板)
//imagecolorallocate ( resource image, int red, int green, int blue )三原色
$bg_color = imagecolorallocate($image, 255, 255, 255);//第一次调式版的时候，背景颜色


//向图像中输出字符

$font='SF_lapstick_Comic_Shaded.ttf';

for($i=0; $i<4; $i++){
	$font_color=imagecolorallocate($image, rand(0,255), rand(0,128), rand(0,255));
	$x=floor(90/4)*$i+3;
	imagettftext($image, 23, 0, $x, rand(23,28), $font_color, $font, substr($rand,$i,1));
}


//输出图像
header("Content-Type: image/png");
imagejpeg($image);

