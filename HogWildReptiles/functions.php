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
                        'dad',
                        'frequentEater'
                );
        }

        function SQL_SELECT($conn, $table, $columns, $conditions = null, $conditions_values = null)
        {
                $select_sql = "SELECT ";
                for($i = 0; $i < count($columns); $i++)
                {
                        if($i == count($columns) - 1)
                        {
                                $select_sql .= $columns[$i];
                        }
                        else
                        {
                                $select_sql .= $columns[$i] . ", ";
                        }
                }

                $select_sql .= " FROM " . $table;

                if($conditions != null)
                {
                        $select_sql .= " WHERE ";

                        for($i = 0; $i < count($conditions); $i++)
                        {
                                if($i == count($conditions) - 1)
                                {
                                        $select_sql .= $conditions[$i] . " = '" . $conditions_values[$i] . "'";
                                }
                                else
                                {
                                        $select_sql .= $conditions[$i] . " = '" . $conditions_values[$i] . "' AND ";
                                }
                        }
                }

                if ($conn->query($select_sql) === false) {
                        echo "Error: " . $select_sql . "<br><br>" . $conn->error;
                } else {
                        return $conn->query($select_sql);
                }
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

        function SQL_INSERT($conn, $table, $columns, $values)
        {
                        $insert_sql = "INSERT INTO " . $table . " (";
                        for($i = 0; $i < count($columns); $i++)
                        {
                            if($i == count($columns) - 1)
                            {
                                $insert_sql .= $columns[$i];
                            }
                            else
                            {
                                $insert_sql .= $columns[$i] . ',';
                            }   
                        }
                        $insert_sql .= ") VALUES ('";
                        for($i = 0; $i < count($columns); $i++)
                        {
                            if($i == count($columns) - 1)
                            {
                                $insert_sql .= $values[$i] . "'";
                            }
                            else
                            {
                                $insert_sql .= $values[$i] . "','";
                            } 
                        }
                        $insert_sql .= ")";

                        if ($conn->query($insert_sql) === TRUE) {
                        } else {
                                echo "Error: " . $insert_sql . "<br><br>" . $conn->error;
                        }
        }
?>