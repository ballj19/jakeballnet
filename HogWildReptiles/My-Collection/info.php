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
        <link href="../style.css" rel="stylesheet">
</head>
<body>
<div class="col-xs-12">
    <div class="col-xs-4">
    <?php
        $image = '../Reptiles/' . $row['name'] . '/Images/img1.jpg';
        echo '<img class="reptile-info-image reptile-img" src="' . $image . '">';
    ?>
    </div>
    <div class="col-xs-8">
        <div class="col-xs-12">
                <?php echo $row['name'] . ' the ' . $row['type'];?>
        </div>
        <div class="col-xs-12">
            <?php echo $row['bio'];?>
        </div>
    </div>
</div>
</body>
</html>