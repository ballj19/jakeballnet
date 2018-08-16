<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../style.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
include '../functions.php';
$conn = Database_Connect('reptiles');

$result = SQL_SELECT($conn,'reptiles',array('name','coverPhoto'));
?>

<div class="col-xs-10 col-xs-offset-1">

<?php
while($row = $result->fetch_assoc())
{
    $name = $row['name'];

    echo '<a href="info.php?name=' . $name . '">';
    echo '<div class="grid-container">';
    if($row['coverPhoto'] != '')
    {
        $image = '../Data/' . $name . '/Images/' . $row['coverPhoto'];
        list($width, $height) = getimagesize($image);
        if($width > $height)
        {
                echo '<img class="individual-pic reptile-img img-landscape" src="' . $image . '?=' .filemtime($image) . '"/>';
        }
        else
        {
                echo '<img class="individual-pic reptile-img img-portrait" src="' . $image . '?=' .filemtime($image) . '"/>';
        }
    }
    else
    {
        echo '<div class="blank-pic">' . $name . '</div>';
    }
    echo '</div>';    
    echo '</a>';
}
?>

</div>


</body>
</html>