<?php

$name = "";
$top = "";
$jg = "";
$mid = "";
$adc = "";
$sup = "";

if(isset($_POST['name']))
{
	$name = htmlspecialchars($_POST['name']);
	$top = htmlspecialchars($_POST['top']);
	$jg = htmlspecialchars($_POST['jg']);
	$mid = htmlspecialchars($_POST['mid']);
	$adc = htmlspecialchars($_POST['adc']);
	$sup = htmlspecialchars($_POST['sup']);
}

?>

<head>
	<link rel="stylesheet" href="style.css" type="text/css">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="JavaScript.js"></script>
</head>

<body >
<div class="page-title col-xs-8 col-xs-offset-2">LEAGUE RANDOMIZER</div>
<div class="entry-form col-xs-8 col-xs-offset-2">
<form method="post" action="index.php" autocomplete="off">
	<div class="entry col-xs-2"><div class="entry-label col-xs-12">NAME </div><div class="entry-box col-xs-12"><input class="col-xs-12" type="text" name="name" value="<?php echo $name;?>" required></div></div>
	<div class="entry col-xs-2"><div class="entry-label col-xs-12">TOP </div><div class="entry-box col-xs-12"><input class="col-xs-12" type="text" name="top" value="<?php echo $top;?>" required></div></div>
	<div class="entry col-xs-2"><div class="entry-label col-xs-12">JG </div><div class="entry-box col-xs-12"><input class="col-xs-12" type="text" name="jg" value="<?php echo $jg;?>" required></div></div>
	<div class="entry col-xs-2"><div class="entry-label col-xs-12">MID </div><div class="entry-box col-xs-12"><input class="col-xs-12" type="text" name="mid" value="<?php echo $mid;?>" required></div></div>
	<div class="entry col-xs-2"><div class="entry-label col-xs-12">ADC </div><div class="entry-box col-xs-12"><input class="col-xs-12" type="text" name="adc" value="<?php echo $adc;?>" required></div></div>
	<div class="entry col-xs-2"><div class="entry-label col-xs-12">SUP </div><div class="entry-box col-xs-12"><input class="col-xs-12" type="text" name="sup" value="<?php echo $sup;?>" required></div></div>
	<div class="lock-in col-xs-12"><input style="height:50px;width:100px;" type="submit" name="submit" value="LOCK IN"></div>
</form>
</div>


<?php
require_once('randomizer.php');
echo '<div id="info">';
echo '<div class="info col-xs-8 col-xs-offset-2">';

if(isset($_POST['name']))
{
	$servername = "localhost";
	$username = "ballj19_root";
	$password = "sitkbm19";
	$dbname = "ballj19_league";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$name = htmlspecialchars($_POST['name']);
	$top = htmlspecialchars($_POST['top']);
	$jg = htmlspecialchars($_POST['jg']);
	$mid = htmlspecialchars($_POST['mid']);
	$adc = htmlspecialchars($_POST['adc']);
	$sup = htmlspecialchars($_POST['sup']);
	$roles = array($top,$jg,$mid,$adc,$sup);

	if(!in_array(1,$roles) || !in_array(2,$roles) || !in_array(3,$roles) || !in_array(4,$roles) || !in_array(5,$roles))
	{
		$message = "Please enter a unique number 1-5 for each role";
		echo "<script type='text/javascript'>alert('$message');</script>";
		return;
	}
	
	if(strlen($name) > 16)
	{
		$message = "Name can be no longer than 16 characters";
		echo "<script type='text/javascript'>alert('$message');</script>";
		return;
	}
	
	$result = $conn->query("SELECT * FROM roles");

	$rows = [];

	while($row = mysqli_fetch_array($result))
	{
		$rows[] = $row;
	}

	if(count($rows) == 5)
	{
		$result = $conn->query("TRUNCATE TABLE roles");
		$result = $conn->query("UPDATE results SET calculated=0");		
	}

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	$insert_sql = "INSERT INTO roles (name, top, jg, mid, adc, sup) VALUES ('"  . $name . "'," . $top . "," . $jg . "," . $mid . "," . $adc . "," . $sup . ")";
		
	if ($conn->query($insert_sql) === TRUE) {
		echo "";
	} else {
		echo "Error: " . $insert_sql . "<br>" . $conn->error;
	}
	
	mysqli_close($conn);
}

$randomizer = new Randomizer();

echo '</div>';
echo '</div>';
?>
</body>