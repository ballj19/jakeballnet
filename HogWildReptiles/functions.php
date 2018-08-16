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

        function Collection_Column($row, $start)
        {
                echo '<div class="collection-column">';
                for($i = $start; $i < count($row); $i += 4)
                {
                        $name = $row[$i]['name'];
                        echo '<a href="info.php?name=' . $name . '">';
                        echo '<div onmouseenter="showName(\'' . $name . '\')" onmouseleave="hideName(\'' . $name . '\')" class="grid-container">';
                        if($row[$i]['coverPhoto'] != '')
                        {
                                $image = '../Data/' . $name . '/Images/' .$row[$i]['coverPhoto'];
                                list($width, $height) = getimagesize($image);
                                if($width > $height)
                                {
                                        echo '<img id="' . $name . '-pic" class="reptile-img " src="' . $image . '?=' .filemtime($image) . '"/>';
                                }
                                else
                                {
                                        echo '<img id="' . $name . '-pic" class="reptile-img" src="' . $image . '?=' .filemtime($image) . '"/>';
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
                echo '</div>';
        }

        function resize_image($file, $w, $h, $crop=FALSE) {
                list($width, $height) = getimagesize($file);
                $r = $width / $height;
                if ($crop) {
                    if ($width > $height) {
                        $width = ceil($width-($width*abs($r-$w/$h)));
                    } else {
                        $height = ceil($height-($height*abs($r-$w/$h)));
                    }
                    $newwidth = $w;
                    $newheight = $h;
                } else {
                    if ($w/$h > $r) {
                        $newwidth = $h*$r;
                        $newheight = $h;
                    } else {
                        $newheight = $w/$r;
                        $newwidth = $w;
                    }
                }
                $src = imagecreatefromjpeg($file);
                $dst = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            
                return $dst;
            }
?>