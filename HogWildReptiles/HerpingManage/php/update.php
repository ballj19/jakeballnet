<?php
$name = $_GET['name'];
$new_name = $_POST['name'];

include '../functions.php';
$conn = Database_Connect('reptiles');
$parameters = Get_Parameters('herping');
$parameters[] = 'bio';

$columns = array();
$values = array();
for($i = 0; $i < count($parameters);$i++)
{
    $columns[] = $parameters[$i];
    $values[] = $_POST[$parameters[$i]];
}

SQL_UPDATE($conn,'herping',$columns,$values,array('name'),array($name));
rename("../HerpingData/$name", "../HerpingData/$new_name");
echo "<script>window.location = '../index.php?name=" . $_POST['name'] . "'</script>";
?>