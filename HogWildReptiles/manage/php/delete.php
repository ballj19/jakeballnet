<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

$id = $_GET['id'];
$table = $_GET['table'];

if($table == 'reptiles')
{
    $return = 'index';
}
else
{
    $return = $table;
}

$conn = Database_Connect('reptiles');

if(!isset($_GET['delete']))
{
    $result = SQL_SELECT($conn, $table, array('name'), array('id'), array($id));
    $row = $result->fetch_assoc();
    $name = $row['name'];
?>


<div>Would you like to delete <?php echo $name; ?></div>
<a href="<?php echo "delete.php?id=" . $id . "&delete=1&table=" . $table;?>">Yes</a>
<a href="../<?php echo $return;?>.php?pw=0619">No</a>

<?php
}

else 
{
        $delete_sql = "DELETE FROM $table WHERE id='" . $id . "'";
        
        if ($conn->query($delete_sql) === TRUE) {
                echo $name . " was deleted successfully";
                echo '<br>';
                echo "<a href='../$return.php?pw=0619'>Go back to managing your reptiles</a>";
            } else {
                echo "Error: " . $delete_sql . "<br>" . $conn->error;
            }
}