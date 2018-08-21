<?php

include '../functions.php';

$_reptile = $_GET['name'];
$reptile = str_replace("%"," ",$_reptile);

if(!isset($_GET['delete']))
{

?>

<div>Would you like to delete <?php echo $reptile; ?></div>
<a href="<?php echo "php/delete.php?name=" . $_reptile . "&delete=1";?>">Yes</a>
<a href="../index.php">No</a>

<?php
}

else 
{
        $conn = Database_Connect('reptiles');
        $delete_sql = "DELETE FROM reptiles WHERE name='" . $reptile . "'";
        
        if ($conn->query($delete_sql) === TRUE) {
                echo $reptile . " was deleted successfully";
                echo '<br>';
                echo '<a href="../index.php">Go back to managing your reptiles</a>';
            } else {
                echo "Error: " . $delete_sql . "<br>" . $conn->error;
            }
}