<!DOCTYPE html>
<html>
<body>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="message.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="message.css" rel="stylesheet">

<?php
	function printNotes($conn){
		$select_sql = "SELECT note,number FROM notes";
		$result = $conn->query($select_sql);
				
		while($printrow = $result->fetch_assoc()){
			$current_note = str_replace("~~","'",$printrow['note']);
			echo '<div class="col-xs-10 col-xs-offset-1 note-row">';
				echo '<div class="col-xs-8 col-xs-offset-1 note-info">' . $current_note . '</div>';
				echo '<div class="note-button">';
					echo '<form method="post" action="">';
						echo '<input type="submit" style="background:linear-gradient(#ff0000,#c60000);height:100px;width:150px;font-size:30px;border-radius:12px;color:white;border-style:none" value="Delete" name="delete_note' . $printrow['number'] . '" />';
					echo '</form>';
				echo '</div>';
			echo '</div>';					
		}
	}
?>

<div class="col-xs-10 col-xs-offset-1" style="margin-top:300px">
	<form method="post" action="">
		<input class="col-xs-8 col-xs-offset-1" style="height:100px;font-size:40px;border-style:solid;border-radius:12px" placeholder="Update Message Here" type="text" name="message" value=""<?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?> />
		<input style="background:linear-gradient(#33ff33,#00b300);height:100px;width:150px;font-size:30px;border-radius:12px;color:white;border-style:none" value="Update" type="submit" name="submit_message" />
	</form>
</div>
	
<?php
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
	
	if(isset($_POST['submit_message'])) {
	
		$conn->query("TRUNCATE TABLE messages");
		
		$new_message = str_replace("'","~~",$_POST['message']);
		
		$insert_sql = "INSERT INTO messages (message)
		VALUES ('" . $new_message . "')";
		
		if ($conn->query($insert_sql) === TRUE) {
		    echo "";
		} else {
		    echo "Error: " . $insert_sql . "<br>" . $conn->error;
		}
	
	}
	
	$select_sql = "SELECT message FROM messages";
	$result = $conn->query($select_sql);
	$row = $result->fetch_assoc();
	$current_message = str_replace("~~","'",$row['message']);
	echo '<div style="font-size:40px" class="col-xs-8 col-xs-offset-2">';
	echo 'Current Message: ';
	echo $current_message;
	echo '</div>';
?>
<div class="col-xs-10 col-xs-offset-1" style="margin-top:200px">
<form method="post" action="">
  <input class="col-xs-8 col-xs-offset-1" style="height:100px;font-size:40px;border-style:solid;border-radius:12px" placeholder="Add New Note Here" type="text" name="note" value=""<?= isset($_POST['note']) ? htmlspecialchars($_POST['note']) : '' ?> />
  <input style="background:linear-gradient(#33ff33,#00b300);height:100px;width:150px;font-size:30px;border-radius:12px;color:white;border-style:none" type="submit" value="Add" name="submit_note" />
</form>
</div>
<?php
	if(isset($_POST['submit_note'])) {
		if($_POST['note'] != ""){
			$new_note = str_replace("'","~~",$_POST['note']);
			
			$insert_sql = "INSERT INTO notes (note)
			VALUES ('" . $new_note . "')";
			
			if ($conn->query($insert_sql) === TRUE) {
			    echo "";
			} else {
			    echo "Error: " . $insert_sql . "<br>" . $conn->error;
			}
		}
		
		printNotes($conn);	
	}
	else{	
		$select_sql = "SELECT note,number FROM notes";
		$result = $conn->query($select_sql);
		
		while($row = $result->fetch_assoc()){
			$post = 'delete_note' . $row['number'];
			if(isset($_POST[$post])){
				$delete_sql = "DELETE FROM notes WHERE number=" . $row['number'];
				
				if ($conn->query($delete_sql) === TRUE) {
				    echo "";
				} else {
				    echo "Error: " . $delete_sql . "<br>" . $conn->error;
				}
				break;
			}					
		}
		
		printNotes($conn);	

	}

	$conn->close();
?>

</body>
</html>