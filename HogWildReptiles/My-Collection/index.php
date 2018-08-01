<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../style.css" rel="stylesheet">
</head>
<body>
<?php
include '../functions.php';
$conn = Database_Connect('reptiles');

$select_sql = "SELECT name FROM reptiles";
$result = $conn->query($select_sql);
?>

<div class="col-xs-10 col-xs-offset-1">

<?php
while($row = $result->fetch_assoc())
{
    $name = $row['name'];
    $image = '../Reptiles/' . $name . '/Images/img1.jpg';

    echo '<a href="info.php?name=' . $name . '">';
    echo '<div class="col-xs-3 col-xs-offset-1">';
    echo '<img class="reptile-grid reptile-img" src="' . $image . '">';
    echo '</div>';    
    echo '</a>';
}
?>

</div>


</body>
</html>