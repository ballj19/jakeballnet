<?php
include 'functions.php';
$conn = Database_Connect('motioncontrol');
$result = SQL_SELECT($conn,'buttons',array('Outputs'), array('id'), array('1'));
$row = $result->fetch_assoc();
$outputs = $row['Outputs'];

for($b = 0;  $b < strlen($outputs); $b+=2)
{
        $upper_nib = base_convert($outputs[$b], 16, 2);
        $lower_nib = base_convert($outputs[$b + 1], 16, 2);

        $upper_nib = str_pad($upper_nib, 4, "0");
        $lower_nib = str_pad($lower_nib, 4, "0");

        $upper_nib = strrev($upper_nib);
        $lower_nib = strrev($lower_nib);
        echo '<div>UIO '. (32 + $b/2) . ":  " . $upper_nib . $lower_nib . '</div>';
}
?>