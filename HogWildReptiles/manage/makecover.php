<?php
include '../functions.php';
$reptile = $_GET['reptile'];
$file = $_GET['file'];
$conn = Database_Connect('reptiles');
SQL_UPDATE($conn,'reptiles',array('coverPhoto'),array($file),array('name'),array($reptile));
?>