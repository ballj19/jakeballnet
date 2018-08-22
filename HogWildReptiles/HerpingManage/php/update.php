<?php
$id = $_GET['id'];

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, 'herping', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];
$parameters = Get_Parameters('herping');
$parameters[] = 'bio';

$columns = array();
$values = array();
for($i = 0; $i < count($parameters);$i++)
{
    $columns[] = $parameters[$i];
    $values[] = $_POST[$parameters[$i]];
}

SQL_UPDATE($conn,'herping',$columns,$values,array('id'),array($id));

$result = SQL_SELECT($conn, 'herping', array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$new_name = $row['name'];

rename("$root/HerpingData/$name", "$root/HerpingData/$new_name");
echo "<script>window.location = '../index.php?id=" . $_GET['id'] . "'</script>";
?>