<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$id = $_GET['id'];

if(!isset($_GET['delete']))
{

?>

<div>Would you like to delete <?php echo $id; ?></div>
<a href="<?php echo "delete.php?id=" . $id . "&delete=1";?>">Yes</a>
<a href="../index.php">No</a>

<?php
}

else 
{
        $conn = Database_Connect('reptiles');
        $delete_sql = "DELETE FROM herping WHERE id='" . $id . "'";
        
        if ($conn->query($delete_sql) === TRUE) {
                echo $id . " was deleted successfully";
                echo '<br>';
                echo '<a href="../index.php">Go back to managing your herping</a>';
            } else {
                echo "Error: " . $delete_sql . "<br>" . $conn->error;
            }
}