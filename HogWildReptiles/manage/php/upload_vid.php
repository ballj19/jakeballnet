<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$id = $_GET['id'];
$video = $_GET['video'];

$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, 'reptiles', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];

SQL_INSERT($conn,'videos',array('name','video','description'), array($name, $video, ''));

?>