<?php
session_start();
header('Content-type : image/png');
$img = imagecreatetruecolor(200,50);

imagefill($img,0,0,0xdddddd);
for($i=0; $i<1000; $i++){
    imagesetpixel($img,rand(0,200),rand(0,50), 0xaaaaaa);
}
for($i=0; $i<7;$i++){
    imageline($img,rand(0.200),rand(0,50),rand(0,200),rand(0,50), 0x888888);
}

$letters = 'zxcvbnmasdfghjklqwertyuiopZXCVBNMASDFGHJKLQWERTYUIOP0987654321';

for($i = 0; $i < 3; $i++){
    $letter = $letters[rand(0,strlen())]
}