<?php
include 'functions.php';
$conn = Database_Connect('motioncontrol');
$result = SQL_SELECT($conn,'buttons',array('LCD'), array('id'), array('1'));
$row = $result->fetch_assoc();
echo '<div>' . substr($row['LCD'],0,16) . '</div>';
echo '<div>' . substr($row['LCD'],16,16) . '</div>';
?>