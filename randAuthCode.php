<?php
$img = imagecreatetruecolor(85,35);
$color = imagecolorallocate($img,255,255,0);
imagefilledrectangle($img,0,0,400,500,$color);

$string = rand(1,9);	$string2 = rand(1,9);	$string3 = rand(1,9);	$string4 = rand(1,9);
$total = $string.=$string2.=$string3.=$string4;
$tranColor = imagecolorallocatealpha($img,0,0,0,75);
imagettftext($img,20,rand(-10,10),10,30, $tranColor,"upload/Roboto-Black.ttf", "{$total}");
header("Content-type: image/jpeg");     //先進行宣告為影樣資料
imagejpeg($img);                        //jpeg輸出
imagedestroy($img);   // 4.
