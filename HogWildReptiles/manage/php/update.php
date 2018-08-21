<?php
$name = $_GET['name'];

include '../functions.php';
$conn = Database_Connect('reptiles');
$parameters = Get_Parameters();
$parameters[] = 'bio';
$parameters[] = 'background';
$parameters[] = 'sex';

$columns = array();
$values = array();
for($i = 0; $i < count($parameters);$i++)
{
    $columns[] = $parameters[$i];
    $values[] = $_POST[$parameters[$i]];
}

SQL_UPDATE($conn,'reptiles',$columns,$values,array('name'),array($name));

echo "<script>window.location = '../index.php?name=" . $_POST['name'] . "'</script>";
?>