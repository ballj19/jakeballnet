<?php

$servername = "localhost";
$username = "ballj19_root";
$password = "sitkbm19";
$dbname = "ballj19_critters";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

for($c=0;$c<4;$c++)
{
	$select_sql = "SELECT `temperature`,`humidity` FROM `critters` WHERE `index`=" . $c;

	$result = $conn->query($select_sql);

	echo '<div class="col-xs-12 critter-table">';

	foreach($result as $row)
	{
		$name = $row['name'];
		$temperature = $row['temperature'];
		$humidity = $row['humidity'];
	}

	echo '<div class="critter-row col-xs-12">';
	echo 	'<div class="col-xs-6 critter-title" onclick="chart()">';
	echo 		'<div class="col-xs-12 col-lg-6"><img class="critter-pic" src="critter' . $c . '.JPG"></div>';
	echo 	'</div>';
	echo 	'<div class="col-xs-6 critter-info">';
	echo 		'<div class="col-xs-12 col-lg-6 critter-temp">' . $temperature . '&#8457</div>';
	echo 		'<div class="col-xs-12 col-lg-6 critter-hum">' . $humidity . '%</div>';
	echo 	'</div>';
	echo '</div>';

	echo '</div>';
}

?>