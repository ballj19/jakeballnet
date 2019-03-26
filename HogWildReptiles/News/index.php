<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Condiment|Nixie+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <script src="javascript.js"></script>
        <link href="style.css" rel="stylesheet">
        <script src="../Calendar/javascript.js"></script>
        <link href="../Calendar/style.css" rel="stylesheet">
        <link href="../nav.css" rel="stylesheet">
</head>
<body>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
Nav_Bar('../', true);
echo '<div class="row">';
$conn = Database_Connect('reptiles');
echo '<div class="col-xs-8 col-xs-offset-2 news-bio">';
$result = SQL_SELECT($conn, 'news', array('*'), array('id'), array($_GET['id']));
$row = $result->fetch_assoc();
?>
<div class="banner-content">
        <div class="banner-text col-xs-12">
                <div class="info-title col-xs-10 col-xs-offset-1">
                        <?php echo $row['name']?>
                </div>
                <div class="info-shortdesc col-xs-10 col-xs-offset-1">
                        <?php echo $row['shortDesc']?>
                </div>
                <div class="bio col-xs-8 col-xs-offset-2">
                        <?php echo $row['bio'];?>
                </div>
        </div>
</div>
</body>
</html>
