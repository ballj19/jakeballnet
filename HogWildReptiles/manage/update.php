<?php
$name = $_POST['name'];

include '../functions.php';
$conn = Database_Connect('reptiles');
$parameters = Get_Parameters();
$param_count = count($parameters);

$update_sql = "UPDATE reptiles SET ";
for($i = 1; $i < $param_count;$i++)
{
    $update_sql .= $parameters[$i] . " = '" . $_POST[$parameters[$i]] . "', ";
}
$update_sql .= "bio = '" . $_POST['bio'] . "'";
$update_sql .= " WHERE name='" . $name . "'"; 

if ($conn->query($update_sql) === TRUE) {
    echo $name . " was updated successfully";
    echo '<br>';
    echo '<a href="index.php">Go back to managing your reptiles</a>';
} else {
    echo "Error: " . $update_sql . "<br>" . $conn->error;
}
?>