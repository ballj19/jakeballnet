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

function Nav_Bar($location, $admin = false)
{
        echo '<div class="nav-bar">';

        echo '<div class="home-btn">';
        echo '<a href="' . $location . '"><i class="fa fa-home"></i></a>';
        echo '</div>';
        $menu_paths = array('aboutme/');
        $menu_headers = array('About Me');
        
        for($i = count($menu_paths) - 1; $i >= 0; $i--)
        {
                $path =  $_SERVER['REQUEST_URI'];
                
                if($path == $menu_paths[$i])
                {
                        echo '<a class="menuitem menuitem-active" href="' . $location . $menu_paths[$i] . '">' . $menu_headers[$i] . '</a>';
                }
                else {
                        echo '<a class="menuitem" href="' . $location . $menu_paths[$i] . '">' . $menu_headers[$i] . '</a>'; 
                }
        }
        echo    '<div class="dropdwn">
                    <button class="dropbtn" onclick="ToggleDropdown()">My Projects
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdwn-content" id="NavDropdown">
                    <a href="'. $location . 'modhub">ModHub</a>
                    <a href="http://www.windingroadreptiles.com">Winding Road Reptiles</a>
                    </div>
                </div>';
        echo '</div>';
}


function SQL_DELETE($conn,$table, $conditions, $conditions_values)
{
        $delete_sql = "DELETE ";

        $delete_sql .= " FROM " . $table;
        $delete_sql .= " WHERE ";

        for($i = 0; $i < count($conditions); $i++)
        {
                if($i == count($conditions) - 1)
                {
                        $delete_sql .= $conditions[$i] . " = '" . $conn->real_escape_string($conditions_values[$i]) . "'";
                }
                else
                {
                        $delete_sql .= $conditions[$i] . " = '" . $conn->real_escape_string($conditions_values[$i]) . "' AND ";
                } 
        }
        if ($conn->query($delete_sql) === false) {
                echo "Error: " . $delete_sql . "<br><br>" . $conn->error;
        } else {
                return $conn->query($delete_sql);
        }
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
                                $select_sql .= $conditions[$i] . " = '" . $conn->real_escape_string($conditions_values[$i]) . "'";
                        }
                        else
                        {
                                $select_sql .= $conditions[$i] . " = '" . $conn->real_escape_string($conditions_values[$i]) . "' AND ";
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
                        $update_sql .= $columns[$i] . " = '" . $conn->real_escape_string($values[$i]) . "'";
                }
                else
                {
                        $update_sql .= $columns[$i] . " = '" . $conn->real_escape_string($values[$i]) . "', ";
                }
        }
        $update_sql .= " WHERE ";
        for($i = 0; $i < count($conditions); $i++)
        {
                if($i == count($conditions) - 1)
                {
                        $update_sql .= $conditions[$i] . "='" . $conn->real_escape_string($conditions_values[$i]) . "'";
                }
                else
                {
                        $update_sql .= $conditions[$i] . "='" . $conn->real_escape_string($conditions_values[$i]) . "' AND ";
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
                        $insert_sql .= $conn->real_escape_string($values[$i]) . "'";
                    }
                    else
                    {
                        $insert_sql .= $conn->real_escape_string($values[$i]) . "','";
                    } 
                }
                $insert_sql .= ")";

                if ($conn->query($insert_sql) === TRUE) {
                } else {
                        echo "Error: " . $insert_sql . "<br><br>" . $conn->error;
                }
}
?>