<?php
$id = $_GET['id'];
$file = $_GET['file'];

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, 'reptiles', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$reptile = $row['name'];

unlink("$root/Data/$reptile/Images/$file");
unlink("$root/Data/$reptile/Images/md/$file");
?>