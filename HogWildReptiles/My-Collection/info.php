<?php
$id = $_GET['id'];

include '../functions.php';
$conn = Database_Connect('reptiles');

$select_sql = "SELECT * FROM reptiles WHERE id='" . $id . "'";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();
$reptile = $row['name'];
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

            $files = array_values(array_diff(scandir($dir), array('.', '..','md')));

            $col_array = Arrange_Banner_Pics($reptile, $files);
            echo '<div class="collection-row">';
            Banner_Column($reptile, $col_array, $files, 0);
            Banner_Column($reptile, $col_array, $files, 1);
            Banner_Column($reptile, $col_array, $files, 2);
            Banner_Column($reptile, $col_array, $files, 3);
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