<?php
$_herping = $_GET['name'];
$herping = str_replace("%"," ",$_herping);

include '../functions.php';
$conn = Database_Connect('reptiles');

$select_sql = "SELECT * FROM herping WHERE name='" . $herping . "'";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();
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
            <div class="herping-title col-xs-8 col-xs-offset-2">
                    <?php echo $row['name']?>
            </div>
            <div class="herping-subtitle col-xs-8 col-xs-offset-2">
                    <?php echo $row['date'];?>
            </div>
            <div class="bio col-xs-8 col-xs-offset-2">
                <?php echo $row['bio'];?>
            </div>
        </div>
        <div id="banner-pictures">
            <?php

            $dir = "../HerpingData/$herping/Images";

            $files = array_values(array_diff(scandir($dir), array('.', '..','md')));

            /*
            for($i = 0; $i < count($files); $i++)
            {
                    $image = $dir . '/md/' . $files[$i];
                    list($width, $height) = getimagesize($image);
                    echo '<div class="info-grid-container">';
                    if($width > $height)
                    {
                            echo '<img class="individual-pic herping-img img-landscape" src="' . $image . '?=' .filemtime($image) . '"/>';
                    }
                    else
                    {
                            echo '<img class="individual-pic herping-img img-portrait" src="' . $image . '?=' .filemtime($image) . '"/>';
                    }
                    echo '</div>';
            }*/

            $col_array = Arrange_Banner_Pics($herping, $files, 'herping');
            echo '<div class="collection-row">';
            Banner_Column($herping, $col_array, $files, 0, 'herping');
            Banner_Column($herping, $col_array, $files, 1, 'herping');
            Banner_Column($herping, $col_array, $files, 2, 'herping');
            Banner_Column($herping, $col_array, $files, 3, 'herping');
            echo '</div>';

            ?>
            </div>
    </div>
        </div>

        <script>
                $(window).resize(function(){
                        //ResizeBannerPics();
                });

                $(document).ready(function(){
                        //ResizeBannerPics();
                });
        </script>
</body>
</html>