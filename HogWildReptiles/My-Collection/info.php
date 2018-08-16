<?php
$_reptile = $_GET['name'];
$reptile = str_replace("%"," ",$_reptile);

include '../functions.php';
$conn = Database_Connect('reptiles');

$select_sql = "SELECT * FROM reptiles WHERE name='" . $reptile . "'";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();
?>
<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Condiment|Nixie+One" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="javascript.js"></script>
</head>
<body style="background-image: url(<?php echo 'backgrounds/' . $row['background'];?>)">
    <div class="banner-container">
    <div class="banner-content">
        <div class="banner-text col-xs-12">
            <div class="reptile-title col-xs-8 col-xs-offset-2">
                    <?php echo $row['name']?>
            </div>
            <div class="reptile-subtitle col-xs-8 col-xs-offset-2">
                    <?php echo 'the ' . $row['type'];;?>
            </div>
            <div class="bio col-xs-8 col-xs-offset-2">
                <?php echo $row['bio'];?>
            </div>
        </div>
        <div id="banner-pictures">
            <?php

            $dir = "../Data/$reptile/Images";

            $files = scandir($dir);

            for($i = 2; $i < count($files); $i++)
            {
                    $image = $dir . '/' . $files[$i];
                    list($width, $height) = getimagesize($image);
                    echo '<div class="grid-container">';
                    if($width > $height)
                    {
                            echo '<img class="individual-pic reptile-img img-landscape" src="' . $image . '?=' .filemtime($image) . '"/>';
                    }
                    else
                    {
                            echo '<img class="individual-pic reptile-img img-portrait" src="' . $image . '?=' .filemtime($image) . '"/>';
                    }
                    echo '</div>';
            }
            ?>
            </div>
    </div>
        </div>

        <script>
                $(window).resize(function(){
                        ResizeBannerPics();
                });

                $(document).ready(function(){
                        ResizeBannerPics();
                });
        </script>
</body>
</html>