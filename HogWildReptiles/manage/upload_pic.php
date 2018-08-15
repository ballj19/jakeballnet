<?php

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

        //FTP_Upload($path,"Data/$name/Images/$file");
        move_uploaded_file($path, "../Data/$name/Images/$file");
}


echo "<script>window.location = 'index.php?name=" . $name . "'</script>";
?>