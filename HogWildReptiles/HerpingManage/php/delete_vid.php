<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$id = $_GET['id'];
$video = $_GET['video'];

$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, 'herping', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];

SQL_DELETE($conn,'videos',array('name','video'), array($name, $video));

?>