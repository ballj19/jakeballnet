<?php

$LCD = $_POST['LCD'];

include 'functions.php';
$conn = Database_Connect('motioncontrol');
SQL_UPDATE($conn,'buttons',array('LCD'),array($LCD), array('id'), array('1'));

?>