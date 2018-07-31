<?php
$name = $_POST['name'];


$servername = "localhost";
$username = "ballj19_root";
$password = "sitkbm19";
$dbname = "ballj19_reptiles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$update_sql = "UPDATE reptiles SET ";
$update_sql .= "type = '" . $_POST['type'] . "'";
$update_sql .= ", bio = '" . $_POST['bio'] . "'";
$update_sql .= " WHERE name='" . $name . "'"; 

if ($conn->query($update_sql) === TRUE) {
    echo $name . " was updated successfully";
    echo '<br>';
    echo '<a href="index.php">Go back to managing your reptiles</a>';
} else {
    echo "Error: " . $update_sql . "<br>" . $conn->error;
}
?>