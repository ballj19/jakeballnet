<?php


$id = $_GET['id'];


$root = $_SERVER["DOCUMENT_ROOT"];
include "$root/functions.php";

$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, 'herping', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];

$dir = "{$root}/HerpingData/$name/Images";
$mddir = "{$root}/HerpingData/$name/Images/md";

if(!file_exists($dir))
{
        mkdir($dir, 0777, true);
}
if(!file_exists($mddir))
{
        mkdir($mddir, 0777, true);
}

echo '<form action="php/upload_pic.php?id=' . $id . '" method="post" enctype="multipart/form-data">';
echo '<input type="file" name="files[]" multiple /><br>';
echo '<input type="submit" name="submit" value="Submit">';
echo '</form>';


$files = array_values(array_diff(scandir($dir), array('.', '..','md')));

for($i = 0; $i < count($files); $i++)
{
        $image =  "$root/HerpingData/$name/Images/md/" . $files[$i];
        $imagesrc = "/HerpingData/$name/Images/md/" . $files[$i];
        list($width, $height) = getimagesize($image);
        echo '<div class="individual-pic-container">';
        if($width > $height)
        {
                echo '<img class="individual-pic img-landscape" src="' . $imagesrc . '?=' .filemtime($image) . '"/>';
        }
        else
        {
                echo '<img class="individual-pic img-portrait" src="' . $imagesrc . '?=' .filemtime($image) . '"/>';
        }
        echo '<input class="pic-button col-xs-6" type="button" value="Delete" onclick="DeletePicture(\'' . $files[$i] . '\');" />';
        echo '<input class="pic-button col-xs-6" type="button" value="Make Cover" onclick="MakeCover(\'' . $files[$i] . '\');" />';
        echo '<input class="pic-button col-xs-6" type="button" value="Rotate Left" onclick="RotatePic(\'' . $files[$i] . '\', 90);" />';
        echo '<input class="pic-button col-xs-6" type="button" value="Rotate Right" onclick="RotatePic(\'' . $files[$i] . '\', 270);" />';
        echo '</div>';
}

?>