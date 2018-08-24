<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
$id = $_GET['id'];
$file = $_GET['file'];
$table = $_GET['table'];
$conn = Database_Connect('reptiles');
SQL_UPDATE($conn,$table,array('coverPhoto'),array($file),array('id'),array($id));
?>