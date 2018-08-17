<?php


$_name = $_GET['name'];
$name = str_replace("%"," ",$_name);

$dir = "../Data/$name/Images";
$mddir = "../Data/$name/Images/md";

if(!file_exists($dir))
{
        mkdir($dir, 0777, true);
}
if(!file_exists($mddir))
{
        mkdir($mddir, 0777, true);
}

echo '<form action="upload_pic.php?name=' . $_name . '" method="post" enctype="multipart/form-data">';
echo '<input type="file" name="files[]" multiple /><br>';
echo '<input type="submit" name="submit" value="Submit">';
echo '</form>';


$files = array_values(array_diff(scandir($dir), array('.', '..','md')));

for($i = 0; $i < count($files); $i++)
{
        $image = $dir . '/' . $files[$i];
        list($width, $height) = getimagesize($image);
        echo '<div class="individual-pic-container">';
        if($width > $height)
        {
                echo '<img class="individual-pic img-landscape" src="' . $image . '?=' .filemtime($image) . '"/>';
        }
        else
        {
                echo '<img class="individual-pic img-portrait" src="' . $image . '?=' .filemtime($image) . '"/>';
        }
        echo '<input class="pic-button col-xs-6" type="button" value="Delete" onclick="DeletePicture(\'' . $files[$i] . '\');" />';
        echo '<input class="pic-button col-xs-6" type="button" value="Make Cover" onclick="MakeCover(\'' . $files[$i] . '\');" />';
        echo '<input class="pic-button col-xs-6" type="button" value="Rotate Left" onclick="RotatePic(\'' . $files[$i] . '\', 90);" />';
        echo '<input class="pic-button col-xs-6" type="button" value="Rotate Right" onclick="RotatePic(\'' . $files[$i] . '\', 270);" />';
        echo '</div>';
}

?>