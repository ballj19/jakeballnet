<?php
$name = $_POST['name'];
$type = $_POST['type'];
$bio = $_POST['bio'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rallyreptiles";

if(isset($_POST['name'])) {
            
        // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

        $insert_sql = "INSERT INTO reptiles (name,type,bio)
        VALUES ('" . $name . "','" . $type . "','" . $bio . "')";
        
        if ($conn->query($insert_sql) === TRUE) {
            echo $name . " added to databse";
            echo '<br>';
            echo '<a href="index.php">Add another reptile</a>';
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
}

?>