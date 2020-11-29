<?php 
header('Content-type: image/jpeg');
$img = imagecreatetruecolor(100,100);

imagefill($img,0,0,0x000080);
imageellipse($img, 50,50,90,90,0xffff00);
imagefilledellipse($img,40,40,15,15, 0xffff00);
imagerectangle($img,10,5,60,25, 0xff0000);

imagejpeg($img);
imagedestroy($img);

?>