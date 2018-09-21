<?php
include 'functions.php';
$conn = Database_Connect('motioncontrol');
$result = SQL_SELECT($conn,'buttons',array('Outputs'), array('id'), array('1'));
$row = $result->fetch_assoc();
$outputs = $row['Outputs'];

for($b = 0;  $b < strlen($outputs); $b++)
{
        $binary = base_convert($outputs[$b], 16, 2);
        
        echo '<div>' . $binary . '</div>';
}
?>