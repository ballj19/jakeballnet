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

include '../functions.php';

$_name = $_GET['name'];
$name = str_replace("%"," ",$_name);

$files = array_filter($_FILES['files']['name']); //something like that to be used before processing files.

// Count # of uploaded files in array
$total = count($_FILES['files']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ )
{
        $file = $_FILES['files']['name'][$i];
        $path = $_FILES['files']['tmp_name'][$i];

        move_uploaded_file($path, "../Data/$name/Images/$file");
        $mdfile = resize_image("../Data/$name/Images/$file", 800, 800);
        if(strpos($file,'.png') !== false  || strpos($file,'.PNG') !== false )
        {
                imagepng($mdfile, "../HerpingData/$name/Images/md/$file");
        }
        else
        {
                imagejpeg($mdfile, "../HerpingData/$name/Images/md/$file");
        }
}


echo "<script>window.location = 'index.php?name=" . $name . "'</script>";
?>