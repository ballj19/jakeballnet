<?php
$id = $_GET['id'];
$table = $_GET['table'];

include '../functions.php';
$conn = Database_Connect('reptiles');

$select_sql = "SELECT * FROM $table WHERE id='" . $id . "'";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();
$name = $row['name'];
?>
<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Condiment|Nixie+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <link href="../nav.css" rel="stylesheet">
        <script src="javascript.js"></script>
</head>
<body>
<?php
Nav_Bar('../');
?>
    <div class="banner-container">
    <div class="banner-content">
        <div class="banner-text col-xs-12">
            <div class="info-title col-xs-8 col-xs-offset-2">
                    <?php echo $row['name']?>
            </div>
            <?php
            if($table == 'reptiles')
            {
                echo '<div class="info-subtitle col-xs-8 col-xs-offset-2">';
                echo 'the ' . $row['type'];
                echo '</div>';
            }
            else if($table == 'herping')
            {
                echo '<div class="info-subtitle col-xs-8 col-xs-offset-2">';
                echo 'the ' . $row['date'];
                echo '</div>';  
            }
            ?>
            <div class="bio col-xs-8 col-xs-offset-2">
                <?php echo $row['bio'];?>
            </div>
        </div>
        <ul class="nav nav-tabs col-xs-12">
                        <li class="active tab-title" id="pictures-tab"><a href="#individual-pics" data-toggle="tab">Pictures</a></li>
                        <li class="tab-title" id="videos-tab"><a href="#individual-vids" data-toggle="tab">Videos</a></li>
        </ul>
        <div class="tab-content col-xs-12">
                <div class="tab-pane active" id="individual-pics">
                        <div id="banner-pictures">
                        <?php
                                
                                $dir = "../Data/$table/$name/Images";

                                $files = array_values(array_diff(scandir($dir), array('.', '..','md')));

                                $col_array = Arrange_Banner_Pics($name, $files, $table);
                                echo '<div class="collection-row">';
                                Banner_Column($name, $col_array, $files, 0, $table);
                                Banner_Column($name, $col_array, $files, 1, $table);
                                Banner_Column($name, $col_array, $files, 2, $table);
                                Banner_Column($name, $col_array, $files, 3, $table);
                                echo '</div>';
                                echo "<div id='modal' class='modal'>

                                <span onclick='CloseModal()' class='close'>&times;</span>

                                <img class='modal-content' id='modal-content'>

                                <div class='caption'></div>
                                </div>";
                        ?>
                        </div>
                </div>
                <div class="tab-pane" id="individual-vids">
                        <div class="col-xs-10 col-xs-offset-1" id="banner-vids">
                        <?php
                                $root = realpath($_SERVER["DOCUMENT_ROOT"]);

                                $result = SQL_SELECT($conn, $table, array('name'), array('id'), array($id));
                                $row = $result->fetch_assoc();
                                $name = $row['name'];

                                $result = SQL_SELECT($conn,'videos',array('*'), array('name'), array($name));

                                while($row = $result->fetch_assoc())
                                {
                                        echo '<div class="col-xs-6">';
                                        echo '<iframe class="youtube" src="https://www.youtube.com/embed/' . $row['video'] . '"></iframe>';
                                        echo '</div>';
                                }

                                ?>
                        </div>
                </div>    
        </div>
        
    </div>
    </div>

        <script>
                $(window).resize(function(){
                        ResizeYoutube();
                });

                $(document).ready(function(){
                        ResizeYoutube();
                });
        </script>
</body>
</html>