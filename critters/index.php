<html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="Refresh.js"></script>
<script src="Critter-Charts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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

date_default_timezone_set('America/Los_Angeles');
$time = date("H") . date("i");

if(isset($_GET['id']))
{
	$delete_sql = "DELETE FROM `critters` WHERE `index`={$id} AND `time`={$time}";

	$result = $conn->query($delete_sql);
	
	$insert_sql = "INSERT INTO `critters` VALUES ({$id},{$temperature},{$humidity},{$time})";
	
	$result = $conn->query($insert_sql);
}

$i = 1; //This is to keep the text length short enough

echo '<div id="critter-table">';
require_once('update-table.php');
echo '</div>';

echo '<div id="diglettModal" class="modal">';
echo '</div>';

?>
</body>
</html>