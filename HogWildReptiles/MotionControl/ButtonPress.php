<?php
$button = $_GET['button'];
include 'functions.php';
$conn = Database_Connect('motioncontrol');
SQL_UPDATE($conn,'buttons',array($button),array('1'), array('id'), array('1'));
?>