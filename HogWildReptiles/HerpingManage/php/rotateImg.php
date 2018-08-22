<?php
function resize_image($file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
                if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
                } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
                }
                $newwidth = $w;
                $newheight = $h;
        } else {
                if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
                } else {
                $newheight = $w/$r;
                $newwidth = $w;
                }
        }

        if(strpos($file,'.png') !== false  || strpos($file,'.PNG') !== false )
        {
                $src = imagecreatefrompng($file);
        }
        else
        {
                $src = imagecreatefromjpeg($file);
        }
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        return $dst;
}

$id = $_GET['id'];
$file = $_GET['file'];
$degrees = $_GET['degrees'];


$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, 'herping', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$herping = $row['name'];

$image = "../HerpingData/$herping/Images/$file";

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

$mdfile = resize_image("$root/HerpingData/$herping/Images/$file", 800, 800);

if(strpos($file,'.png') !== false  || strpos($file,'.PNG') !== false )
{
        imagepng($mdfile, "$root/HerpingData/$herping/Images/md/$file");
}
else
{
        imagejpeg($mdfile, "$root/HerpingData/$herping/Images/md/$file");
}
?>