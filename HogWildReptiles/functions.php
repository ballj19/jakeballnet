<?php
        function Database_Connect($database)
        {
                $servername = "localhost";
                if($_SERVER['HTTP_HOST'] == 'localhost')
                {
                        $username = "root";
                        $password = "";
                        $dbname = $database;
                }
                else 
                {
                        $username = "ballj19_root";
                        $password = "sitkbm19";
                        $dbname = 'ballj19_' . $database;
                }

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                return $conn;
        }

        function Get_Parameters()
        {
                return array(
                        'name',
                        'type',
                        'forsale',
                        'price',
                        'hatch',
                        'mom',
                        'dad'
                );
        }

        function SQL_SELECT($table, $columns)
        {

        }

        function SQL_UPDATE($conn, $table, $columns, $values, $conditions, $conditions_values)
        {
                $update_sql = "UPDATE " . $table . " SET ";
                for($i = 0; $i < count($columns); $i++)
                {
                        if($i == count($columns) - 1)
                        {
                                $update_sql .= $columns[$i] . " = '" . $values[$i] . "'";
                        }
                        else
                        {
                                $update_sql .= $columns[$i] . " = '" . $values[$i] . "', ";
                        }
                }
                $update_sql .= " WHERE ";
                for($i = 0; $i < count($conditions); $i++)
                {
                        if($i == count($conditions) - 1)
                        {
                                $update_sql .= $conditions[$i] . "='" . $conditions_values[$i] . "'";
                        }
                        else
                        {
                                $update_sql .= $conditions[$i] . "='" . $conditions_values[$i] . "' AND ";
                        }                        
                }
                if ($conn->query($update_sql) === TRUE) {
                } else {
                        echo "Error: " . $update_sql . "<br><br>" . $conn->error;
                }
        }

        function SQL_INSERT($table, $columns, $values)
        {

        }
?>