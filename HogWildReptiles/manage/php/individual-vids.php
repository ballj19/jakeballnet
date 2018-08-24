<div class="col-xs-12 add-video">
<input type="text" name="newVideo" id="newVideo">
<button onclick="UploadVideo(newVideo.value)">Add</button>
</div>

<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$id = $_GET['id'];
$table = $_GET['table'];

$conn = Database_Connect('reptiles');

$result = SQL_SELECT($conn, $table, array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];

$result = SQL_SELECT($conn,'videos',array('*'), array('name'), array($name));

while($row = $result->fetch_assoc())
{
        echo '<div class="col-xs-6">';
        echo '<iframe class="youtube" src="https://www.youtube.com/embed/' . $row['video'] . '"></iframe>';
        echo '<button onclick="DeleteVideo(\'' . $row['video'] . '\')">Delete</button>';
        echo '</div>';
}

?>