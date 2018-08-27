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

        function Get_Parameters($table = 'reptiles')
        {
                if($table == 'herping')
                {
                        return array(
                                'name',
                                'location',
                                'date'
                        );    
                }
                else if($table == 'reptiles')
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
                else if($table == 'news')
                {
                        return array(
                                'name',
                                'date',
                                'active',
                                'front',
                        );    
                }
                else
                {
                        return array();
                }
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

        function Collection_Column($col_array, $row, $column, $table)
        {
                $root = realpath($_SERVER["DOCUMENT_ROOT"]);
                echo '<div class="collection-column">';
                for($i = 0; $i < count($row); $i++)
                {
                        if($col_array[$i] == $column)
                        {
                                $name = $row[$i]['name'];
                                $id = $row[$i]['id'];
                                echo '<a href="info.php?id=' . $id . '&table=' . $table . '">';
                                echo '<div onmouseenter="showName(\'' . $id . '\')" onmouseleave="hideName(\'' . $id . '\')" class="grid-container">';
                                if($row[$i]['coverPhoto'] != '')
                                {
                                        $imagesrc = "/Data/$table/$name/Images/md/" . $row[$i]['coverPhoto'];
                                        $image = "$root/Data/$table/$name/Images/md/" . $row[$i]['coverPhoto'];
                                        echo '<img id="' . $id . '-pic" class="collection-img" src="' . $imagesrc . '?=' .filemtime($image) . '"/>';
                                        echo '<div class="picture-name" style="display:none" id="' . $id . '">' . $name . '</div>';
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

        function Banner_Column($name, $col_array, $row, $column, $table)
        {
                $root = realpath($_SERVER["DOCUMENT_ROOT"]);
                echo '<div class="collection-column">';
                for($i = 0; $i < count($row); $i++)
                {
                        if($col_array[$i] == $column)
                        {
                                $imagesrc = "/Data/$table/$name/Images/md/" . $row[$i];
                                $largeimgsrc = "/Data/$table/$name/Images/" . $row[$i];
                                $image = "$root/Data/$table/$name/Images/md/" . $row[$i];
                                echo '<div class="grid-container">';
                                        echo '<img onclick="DisplayModal(\'' . $largeimgsrc . '\')" id="' . $name . '-pic" class="collection-img" src="' . $imagesrc . '?=' .filemtime($image) . '"/>';
                                echo '</div>';  
                        }
                }
                echo '</div>';
        }

        function Arrange_Collage($row, $table)
        {
                $root = realpath($_SERVER["DOCUMENT_ROOT"]);
                $col_1 = 0;
                $col_2 = 0;
                $col_3 = 0;
                $col_4 = 0;

                $col_array = array();

                foreach($row as $reptile)
                {
                        $image = "$root/Data/$table/" . $reptile['name'] . '/Images/' .$reptile['coverPhoto'];
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

        function Arrange_Banner_Pics($name, $row, $table)
        {
                $root = realpath($_SERVER["DOCUMENT_ROOT"]);
                $col_1 = 0;
                $col_2 = 0;
                $col_3 = 0;
                $col_4 = 0;

                $col_array = array();

                foreach($row as $pic)
                {
                        $image = "$root/Data/$table/$name/Images/" . $pic;
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

        function Nav_Bar($location, $admin = false)
        {
                if(isset($_COOKIE['admin']))
                {
                        $admin = true;
                }

                echo '<div class="nav-bar">';
                echo '<a href="' . $location . '"><img src="' . $location . 'WRReptiles_Logo_White.png" class="logo"></a>';
                $menu_paths = array('Available/','About-Us/','Contact-Us/','My-Collection/herping.php','My-Collection/');
                $menu_headers = array('Available','About Us','Contact Us','Herping','My Collection');

                if($admin)
                {
                        $menu_paths[] = 'manage/?pw=0619';
                        $menu_paths[] = 'manage/herping.php?pw=0619';
                        $menu_paths[] = 'manage/news.php?pw=0619';

                        $menu_headers[] = 'Manage';
                        $menu_headers[] = 'HerpingManage';
                        $menu_headers[] = 'NewsManage';
                }

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

        function Manage($table, $modules)
        {
                //modules[0] = form
                //modules[1] = calendar
                //modules[2] = pictures
                //modules[3] = videos

                $conn = Database_Connect('reptiles');

                $id = '';
                if(isset($_GET['id']))
                {
                        $id = $_GET['id'];
                }

                $select_sql = "SELECT id, name FROM $table";
                $result = $conn->query($select_sql);

                /***********************************************************************************
                 ****************                 DROPDOWN MENU                         ************
                 ***********************************************************************************/

                echo "<div class='col-xs-12 dropdown-selection'>";
                echo    '<select class="col-xs-2 col-xs-offset-5 dropdown" name="dropdownselect" id="dropdownselect" onchange="javascript:GenerateInfo(dropdownselect.value,' . '\'' .  $table . '\')">';
                                while($row = $result->fetch_assoc())
                                {
                                        echo '<option class="dropdown-option" value="' . $row['id'] . '">' . $row['name'] . '</option>';				
                                }
                echo    "</select>";
                echo    '<button id="add-button" onclick="AddForm(' . '\'' .  $table . '\')">+</button>';
                echo "</div>";

                /***********************************************************************************
                 ****************                 INFO SECTION                          ************
                 ***********************************************************************************/

                echo "<div class='$table-info col-xs-12'>";
                echo    "<ul class='nav nav-tabs col-xs-12'>";
                echo           "<li class='active tab-title' id='info-tab'><a href='#info' data-toggle='tab'>Info</a></li>";
                if($modules[1])
                {
                        echo           "<li class='tab-title' id='calendar-tab'><a href='#individual-calendar-tab' data-toggle='tab'>Calendar</a></li>";  
                }
                if($modules[2])
                {
                        echo           "<li class='tab-title' id='pictures-tab'><a href='#individual-pics' data-toggle='tab'>Pictures</a></li>";
                }
                if($modules[3])
                {
                        echo           "<li class='tab-title' id='videos-tab'><a href='#individual-vids' data-toggle='tab'>Videos</a></li>";
                }
                echo    "</ul>";
                echo    "<div class='tab-content col-xs-12'>";
                echo        "<div class='tab-pane active' id='info'>";
                echo            "<div class='col-xs-12' id='enter-form'>";

                echo            "</div>";
                echo        "</div>";
                if($modules[1])
                {
                        echo        "<div class='tab-pane' id='individual-calendar-tab'>";
                        echo            "<div id='dropdown-date'>";
        
                        echo            "</div>";
                        echo            "<div class='col-xs-10 col-xs-offset-1' id='calendar'>";
        
                        echo            "</div>";
                        echo        "</div>";
                }
                if($modules[2])
                {
                        echo        "<div class='tab-pane' id='individual-pics'>";
                        echo            "<div class='col-xs-10 col-xs-offset-1' id='individual-pics'>";
        
                        echo            "</div>";
                        echo        "</div>";
                }
                if($modules[3])
                {
                        echo        "<div class='tab-pane' id='individual-vids'>";
                        echo            "<div class='col-xs-10 col-xs-offset-1' id='individual-vids'>";
        
                        echo            "</div>";
                        echo        "</div>";
                }
                echo    "</div>";
                echo "</div>";

                /***********************************************************************************
                 ****************                JAVASCRIPT SECTION                     ************
                 ***********************************************************************************/
                if(isset($_GET['id']))
                {
                        echo '<script>';
                                echo "document.getElementById('dropdownselect').value = '" . $id . "';";
                        echo '</script>';
                }

                echo "<script>";
                echo        "GenerateInfo(dropdownselect.value, '$table');"; //Run once so the first reptile is shown
                echo "</script>";

        }

        function Collection($table)
        {
                $conn = Database_Connect('reptiles');

                $result = SQL_SELECT($conn,$table,array('id','name','coverPhoto'));
                ?>
                <?php
                $row = array();
                while($rows = $result->fetch_assoc())
                {
                        $row[] = $rows;
                }
                $col_array = Arrange_Collage($row, $table);
                echo '<div class="collection-row">';
                Collection_Column($col_array, $row, 0, $table);
                Collection_Column($col_array, $row, 1, $table);
                Collection_Column($col_array, $row, 2, $table);
                Collection_Column($col_array, $row, 3, $table);
                echo '</div>';

        }
?>