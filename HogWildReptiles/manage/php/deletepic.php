<?php
$id = $_GET['id'];
$file = $_GET['file'];
$table = $_GET['table'];

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, $table, array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];

unlink("$root/Data/$table/$name/Images/$file");
unlink("$root/Data/$table/$name/Images/md/$file");
?>