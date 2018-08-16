<?php
include '../functions.php';

$name = $_POST['name'];
$type = $_POST['type'];
$bio = $_POST['bio'];

$parameters = Get_Parameters();
$param_size = count($parameters);

if(isset($_POST['name'])) {
        if(strpos($_POST['name'],' ') !== false)
        {
            echo 'Please do not enter names with spaces';
        } 
        else
        {
            /*$conn = Database_Connect('reptiles');
            //$insert_sql = "INSERT INTO reptiles (name,type,bio)
            //VALUES ('" . $name . "','" . $type . "','" . $bio . "')";
    
            $insert_sql = "INSERT INTO reptiles (name,";
            for($i = 1; $i < $param_size; $i++)
            {
                $insert_sql .= $parameters[$i] . ',';
            }
            $insert_sql .= "bio) VALUES ('" . $name . "','";
            for($i = 1; $i < $param_size; $i++)
            {
                $insert_sql .= $_POST[$parameters[$i]] . "','";
            }
            $insert_sql .= $bio . "')";
            
            if ($conn->query($insert_sql) === TRUE) {
                echo $name . " added to database";
                echo '<br>';
                echo '<a href="../manage/index.php">Manage Reptiles</a>';
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }*/
            $conn = Database_Connect('reptiles');
            
            $parameters = Get_Parameters();
            $parameters[] = 'bio';
            $parameters[] = 'background';

            $columns = array();
            $values = array();
            for($i = 0; $i < count($parameters);$i++)
            {
                $columns[] = $parameters[$i];
                $values[] = $_POST[$parameters[$i]];
            }

            $columns[] = 'coverPhoto';
            $values[] = '';

            SQL_INSERT($conn,'reptiles',$columns,$values);
        }
}

?>