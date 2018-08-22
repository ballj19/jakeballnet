<?php
$id = $_GET['id'];
$file = $_GET['file'];

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, 'herping', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$herping = $row['name'];

unlink("$root/HerpingData/$herping/Images/$file");
unlink("$root/HerpingData/$herping/Images/md/$file");
?>