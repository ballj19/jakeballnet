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

        function Get_Parameters($type = 'reptile')
        {
                if($type == 'herping')
                {
                        return array(
                                'name',
                                'location',
                                'date'
                        );    
                }
                else if($type = 'reptile')
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
                else
                {
                        return array();
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

        function FTP_Upload($local,$remote)
        {
                // connect to server
                $connection = ftp_connect('jakeball.net');
                
                // login
                if (@ftp_login($connection, 'ballj19', 'Flosnipe12')){
                        // successfully connected
                }else{
                        return false;
                }
                
                ftp_put($connection, "/public_html/HogWildReptiles/$remote", $local, FTP_BINARY);
                ftp_close($connection);
                return true;
        }

        function Dropdown_Parameter($parameter, $options, $selected)
        {
                echo '<div class="col-xs-12 parameter">';
                echo    '<div class="col-xs-3 input-label">' . $parameter . '</div>';
                echo '<select class="col-xs-6 input-box" name="' . $parameter . '" id="' . $parameter . '" value="">';
                $dir = '../My-Collection/backgrounds/';
                $files = scandir($dir);
                for($i = 0; $i < count($options); $i++)
                {
                        if($options[$i] == $selected)
                        {
                                echo '<option class="reptile-option" value="' . $options[$i] . '" selected>' . $options[$i] . '</option>';
                        }
                        else
                        {
                                echo '<option class="reptile-option" value="' . $options[$i] . '">' . $options[$i] . '</option>';
                        }
                }
                echo '</select>';
                echo '</div>';
        }

        function Collection_Column($col_array, $row, $column, $type = 'reptile')
        {
                echo '<div class="collection-column">';
                for($i = 0; $i < count($row); $i++)
                {
                        if($col_array[$i] == $column)
                        {
                                $name = $row[$i]['name'];
                                echo '<a href="info.php?name=' . $name . '">';
                                echo '<div onmouseenter="showName(\'' . $name . '\')" onmouseleave="hideName(\'' . $name . '\')" class="grid-container">';
                                if($row[$i]['coverPhoto'] != '')
                                {
                                        if($type == 'herping')
                                        {
                                                $image = '../HerpingData/' . $name . '/Images/md/' .$row[$i]['coverPhoto'];
                                        }
                                        else if($type == 'reptile')
                                        {
                                                $image = '../Data/' . $name . '/Images/md/' .$row[$i]['coverPhoto'];
                                        }
                                        list($width, $height) = getimagesize($image);
                                        if($width > $height)
                                        {
                                                echo '<img id="' . $name . '-pic" class="' . $type . '-img" src="' . $image . '?=' .filemtime($image) . '"/>';
                                        }
                                        else
                                        {
                                                echo '<img id="' . $name . '-pic" class="' . $type . '-img" src="' . $image . '?=' .filemtime($image) . '"/>';
                                        }
                                        echo '<div class="picture-name" style="display:none" id="' . $name . '">' . $name . '</div>';
                                }
                                else
                                {
                                        echo '<div class="blank-pic">' . $name . '</div>';
                                }
                                echo '</div>';    
                                echo '</a>';
                        }
                }
                echo '</div>';
        }

        function Banner_Column($name, $col_array, $row, $column, $type = 'reptile')
        {
                echo '<div class="collection-column">';
                for($i = 0; $i < count($row); $i++)
                {
                        if($col_array[$i] == $column)
                        {
                                echo '<div class="grid-container">';
                                        if($type == 'herping')
                                        {
                                                $image = '../HerpingData/' . $name . '/Images/md/' .$row[$i];
                                        }
                                        else if($type == 'reptile')
                                        {
                                                $image = '../Data/' . $name . '/Images/md/' .$row[$i];
                                        }
                                        echo '<img id="' . $name . '-pic" class="' . $type . '-img" src="' . $image . '?=' .filemtime($image) . '"/>';
                                echo '</div>';  
                        }
                }
                echo '</div>';
        }

        function Arrange_Collage($row, $type='reptiles')
        {
                $col_1 = 0;
                $col_2 = 0;
                $col_3 = 0;
                $col_4 = 0;

                $col_array = array();

                foreach($row as $reptile)
                {
                        if($type == 'herping')
                        {
                                $image = '../HerpingData/' . $reptile['name'] . '/Images/' .$reptile['coverPhoto'];
                        }
                        else if($type == 'reptiles')
                        {
                                $image = '../Data/' . $reptile['name'] . '/Images/' .$reptile['coverPhoto'];
                        }
                        list($width, $height) = getimagesize($image);

                        if($col_1 == min($col_1, $col_2, $col_3, $col_4))
                        {
                                $col_1 += $height;
                                $col_array[] = 0;
                        }
                        else if($col_2 == min($col_1, $col_2, $col_3, $col_4))
                        {
                                $col_2 += $height;
                                $col_array[] = 1;
                        }
                        else if($col_3 == min($col_1, $col_2, $col_3, $col_4))
                        {
                                $col_3 += $height;
                                $col_array[] = 2;
                        }
                        else if($col_4 == min($col_1, $col_2, $col_3, $col_4))
                        {
                                $col_4 += $height;
                                $col_array[] = 3;
                        }
                }

                return $col_array;
        }

        function Arrange_Banner_Pics($name, $row, $type='reptiles')
        {
                $col_1 = 0;
                $col_2 = 0;
                $col_3 = 0;
                $col_4 = 0;

                $col_array = array();

                foreach($row as $pic)
                {
                        if($type == 'herping')
                        {
                                $image = '../HerpingData/' . $name . '/Images/' . $pic;
                        }
                        else if($type == 'reptiles')
                        {
                                $image = '../Data/' . $name . '/Images/' . $pic;
                        }
                        list($width, $height) = getimagesize($image);

                        if($col_1 == min($col_1, $col_2, $col_3, $col_4))
                        {
                                $col_1 += $height;
                                $col_array[] = 0;
                        }
                        else if($col_2 == min($col_1, $col_2, $col_3, $col_4))
                        {
                                $col_2 += $height;
                                $col_array[] = 1;
                        }
                        else if($col_3 == min($col_1, $col_2, $col_3, $col_4))
                        {
                                $col_3 += $height;
                                $col_array[] = 2;
                        }
                        else if($col_4 == min($col_1, $col_2, $col_3, $col_4))
                        {
                                $col_4 += $height;
                                $col_array[] = 3;
                        }
                }

                return $col_array;
        }

        function Nav_Bar($location)
        {
                echo '<div class="nav-bar">';
                echo '<a href="' . $location . '"><img src="' . $location . 'WRReptiles_Logo_White.png" class="logo"></a>';
                $menu_paths = array('Available/','About-Us/','Contact-Us/','Herping','My-Collection/');
                $menu_headers = array('Available','About Us','Contact Us','Herping','My Collection');

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
    
                echo '</div>';
        }
?>