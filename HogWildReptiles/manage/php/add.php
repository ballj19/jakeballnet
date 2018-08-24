<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
$table = $_GET['table'];

if($table == 'reptiles')
{
    $return = 'index';
}
else
{
    $return = $table;
}

if(isset($_POST['name'])) {
            $conn = Database_Connect('reptiles');
            
            $parameters = Get_Parameters($table);

            if($table == 'reptiles')
            {
                $parameters[] = 'background';
            }
            $parameters[] = 'bio';

            $columns = array();
            $values = array();
            for($i = 0; $i < count($parameters);$i++)
            {
                $columns[] = $parameters[$i];
                $values[] = $_POST[$parameters[$i]];
            }

            $columns[] = 'coverPhoto';
            $values[] = '';

            SQL_INSERT($conn,$table,$columns,$values);
            echo "<script>window.location = '../$return.php?pw=0619';</script>";
}

?>