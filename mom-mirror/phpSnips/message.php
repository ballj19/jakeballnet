	<?php
		ini_set("allow_url_fopen", 1);
		$servername = "localhost";
		$username = "ballj19_root";
		$password = "sitkbm19";
		$dbname = "ballj19_message";
	?>

<div class="col-sm-8 col-sm-offset-2 message">
	<?php 
		  // Create connection
		  $conn = new mysqli($servername, $username, $password, $dbname);
		  // Check connection
		  if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
		  } 

		  $select_sql = "SELECT message FROM messages";
		  $result = $conn->query($select_sql);
		  $row = $result->fetch_assoc();
		  $current_message = str_replace("~~","'",$row['message']);
		  echo $current_message;
		  $conn->close();
	?>
</div>
