<?php

include '../functions.php';

$_herping = $_GET['name'];
$herping = str_replace("%"," ",$_herping);

if(!isset($_GET['delete']))
{

?>

<div>Would you like to delete <?php echo $herping; ?></div>
<a href="<?php echo "delete.php?name=" . $_herping . "&delete=1";?>">Yes</a>
<a href="index.php">No</a>

<?php
}

else 
{
        $conn = Database_Connect('reptiles');
        $delete_sql = "DELETE FROM herping WHERE name='" . $herping . "'";
        
        if ($conn->query($delete_sql) === TRUE) {
                echo $herping . " was deleted successfully";
                echo '<br>';
                echo '<a href="index.php">Go back to managing your herpings</a>';
            } else {
                echo "Error: " . $delete_sql . "<br>" . $conn->error;
            }
}