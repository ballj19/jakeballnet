<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";

if(isset($_POST['name'])) {
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

        $columns[] = 'coverPhoto';
        $values[] = '';

        SQL_INSERT($conn,'herping',$columns,$values);                
        echo "<script>window.location = '../index.php';</script>";
}

?>