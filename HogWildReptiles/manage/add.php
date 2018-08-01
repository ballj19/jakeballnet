<?php
include '../functions.php';

$name = $_POST['name'];
$type = $_POST['type'];
$bio = $_POST['bio'];

if(isset($_POST['name'])) {
        $conn = Database_Connect('reptiles');
        $insert_sql = "INSERT INTO reptiles (name,type,bio)
        VALUES ('" . $name . "','" . $type . "','" . $bio . "')";
        
        if ($conn->query($insert_sql) === TRUE) {
            echo $name . " added to database";
            echo '<br>';
            echo '<a href="../manage/index.php">Manage Reptiles</a>';
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
}

?>