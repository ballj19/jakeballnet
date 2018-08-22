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


$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, 'reptiles', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];

$files = array_filter($_FILES['files']['name']); //something like that to be used before processing files.

// Count # of uploaded files in array
$total = count($_FILES['files']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ )
{
        $file = $_FILES['files']['name'][$i];
        $path = $_FILES['files']['tmp_name'][$i];

        move_uploaded_file($path, "$root/Data/$name/Images/$file");
        $mdfile = resize_image("$root/Data/$name/Images/$file", 800, 800);
        if(strpos($file,'.png') !== false  || strpos($file,'.PNG') !== false )
        {
                imagepng($mdfile, "$root/Data/$name/Images/md/$file");
        }
        else
        {
                imagejpeg($mdfile, "$root/Data/$name/Images/md/$file");
        }
}


echo "<script>window.location = '../index.php?id=" . $id . "'</script>";
?>