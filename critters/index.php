<html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="JavaScript.js"></script>
<link rel="stylesheet" href="style.css"> 
</head>

<body>
<?php 
 
$id = htmlspecialchars($_GET['id']);
(float) $temperature = htmlspecialchars($_GET['temperature']);
(float) $humidity = htmlspecialchars($_GET['humidity']);

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

if(isset($_GET['id']))
{
	$update_sql = "UPDATE `critters` SET `temperature`=" . $temperature . ",`humidity`=" . $humidity . " WHERE `index`=" . $id;
	
	$result = $conn->query($update_sql);
}

$select_sql = "SELECT name,temperature,humidity FROM critters";

$result = $conn->query($select_sql);

$i = 1; //This is to keep the text length short enough

echo '<div class="col-xs-12 critter-table">';


foreach($result as $row)
{
	echo '<div class="col-xs-6 col-lg-2 critter-pic">test</div>';
	echo '<div class="col-xs-6 col-lg-4 critter-name">' . $row['name'] . '</div>';
	echo '<div class="col-xs-6 col-lg-3 critter-temp">' . $row['temperature'] . '&#8457</div>';
	echo '<div class="col-xs-6 col-lg-3 critter-hum">' . $row['humidity'] . '%</div>';
	
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
}

echo '</div>';

if(isset($_GET['text'])) {		
	mail('9166226745@vtext.com','',$text);	
}

?>
</body>
</html>