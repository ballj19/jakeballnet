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

$select_sql = "SELECT name,temperature,humidity FROM critters";

$result = $conn->query($select_sql);
$i=1;

$c = 0;

echo '<div class="col-xs-12 critter-table">';

foreach($result as $row)
{
	echo '<div class="critter-row col-xs-12">';
	echo 	'<div class="col-xs-6 critter-title">';
	echo 		'<div class="col-xs-12 col-lg-6"><img class="critter-pic" src="critter' . $c . '.JPG"></div>';
	echo 		'<div class="col-xs-12 col-lg-6 critter-name">' . $row['name'] . '</div>';
	echo 	'</div>';
	echo 	'<div class="col-xs-6 critter-info">';
	echo 		'<div class="col-xs-12 col-lg-6 critter-temp">' . $row['temperature'] . '&#8457</div>';
	echo 		'<div class="col-xs-12 col-lg-6 critter-hum">' . $row['humidity'] . '%</div>';
	echo 	'</div>';
	echo '</div>';

	if(isset($_GET['text'])) // This is to keep the text length short enough for verizon to send
	{
		$text = $text . "\n";
		$text = $text . $row['name'] . "\n";
		$text = $text . "T: " . $row['temperature'] . "\n";
		$text = $text . "H: " . $row['humidity'] . "\n";

		if($i == 6)
		{
			mail('9166226745@vtext.com','',$text);
			$text = "";
			$i=1;
		}
		else
		{
			$i++;
		}
    }
    $c++;
}

echo '</div>';


if(isset($_GET['text'])) {		
	mail('9166226745@vtext.com','',$text);	
}


?>