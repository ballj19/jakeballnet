<?php
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

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
$conn = Database_Connect('reptiles');
$result = SQL_SELECT($conn, $table, array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];
$parameters = Get_Parameters($table);
$parameters[] = 'bio';
if($table == 'reptiles')
{
    $parameters[] = 'background';
    $parameters[] = 'sex';
}


$columns = array();
$values = array();
for($i = 0; $i < count($parameters);$i++)
{
    $columns[] = $parameters[$i];
    $values[] = $_POST[$parameters[$i]];
}

SQL_UPDATE($conn,$table,$columns,$values,array('id'),array($id));
$result = SQL_SELECT($conn, $table, array('name'), array('id'), array($id));
$row = $result->fetch_assoc();
$new_name = $row['name'];

rename("$root/Data/$table/$name", "$root/Data/$table/$new_name");
echo "<script>window.location = '../$return.php?pw=0619&id=" . $_GET['id'] . "';</script>";
?>