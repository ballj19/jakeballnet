<div class="note col-sm-7">
	<?
		$servername = "localhost";
		$username = "ballj19_root";
		$password = "sitkbm19";
		$dbname = "ballj19_message";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		} 
		
		$select_sql = "SELECT note FROM notes";
		$result = $conn->query($select_sql);
		while($row = $result->fetch_assoc()){
		$current_note = str_replace("~~","'",$row['note']);
		echo '<div id="note">';
			echo '<div class="col-sm-12 list-item">';
				echo '<div class="glyphicon glyphicon-list list-icon"></div> ';
				echo '<div class="col-sm-10">';
					echo $current_note;
				echo '</div>';  
			echo '</div>';
		echo '</div>';
		}
		$conn->close();
	?>
</div>