<?php

$reptile = $_GET['reptile'];
$file = $_GET['file'];
$degrees = $_GET['degrees'];

$image = "../Data/$reptile/Images/$file";

// Set the content type header - in this case image/jpeg
header('Content-Type: image/jpeg');

// Load the image
$source = imagecreatefromjpeg($image);

// Rotate
$rotate = imagerotate($source, $degrees, 0);

//and save it on your server...
imagejpeg($rotate, $image, 100);

// Free the memory
imagedestroy($source);
imagedestroy($rotate);
?>