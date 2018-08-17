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
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}
        $dir = "../Data";
        $reptiles = scandir($dir);

        for($i = 2; $i < count($reptiles); $i++)
        {
                $reptile = $reptiles[$i];
                $pics = scandir("../Data/$reptile/Images");
                
                
                $mddir = "../Data/$reptile/Images/md";
                if(!file_exists($mddir))
                {
                        mkdir($mddir, 0777, true);
        
                        for($i = 2; $i < count($pics); $i++)
                        {
                            $file = $pics[$i];
                            $mdfile = resize_image("../Data/$reptile/Images/$file", 800, 800);
                            imagejpeg($mdfile, "../Data/$reptile/Images/md/$file");
                        }
                }
        }
?>