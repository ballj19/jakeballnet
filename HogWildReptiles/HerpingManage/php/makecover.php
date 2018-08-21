<?php
include '../functions.php';
$herping = $_GET['herping'];
$file = $_GET['file'];
$conn = Database_Connect('reptiles');
SQL_UPDATE($conn,'herping',array('coverPhoto'),array($file),array('name'),array($herping));
?>