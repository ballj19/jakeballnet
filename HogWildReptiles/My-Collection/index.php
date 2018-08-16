<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../style.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="javascript.js"></script>
</head>
<body class="index-body">
<?php
include '../functions.php';
$conn = Database_Connect('reptiles');

$result = SQL_SELECT($conn,'reptiles',array('name','coverPhoto'));
?>
<?php
/*
echo '<div class="col-xs-10 col-xs-offset-1">'


while($row = $result->fetch_assoc())
{
    $name = $row['name'];

    echo '<a href="info.php?name=' . $name . '">';
    echo '<div onmouseenter="showName(\'' . $name . '\')" onmouseleave="hideName(\'' . $name . '\')" class="col-xs-3 grid-container">';
    if($row['coverPhoto'] != '')
    {
        $image = '../Data/' . $name . '/Images/' . $row['coverPhoto'];
        list($width, $height) = getimagesize($image);
        if($width > $height)
        {
                echo '<img id="' . $name . '-pic" class="individual-pic img-responsive reptile-img " src="' . $image . '?=' .filemtime($image) . '"/>';
        }
        else
        {
                echo '<img id="' . $name . '-pic" class="individual-pic reptile-img img-responsive" src="' . $image . '?=' .filemtime($image) . '"/>';
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



echo '</div>';*/
$row = array();
while($rows = $result->fetch_assoc())
{
    $row[] = $rows;
}
echo '<div class="collection-row">';
Collection_Column($row, 0);
Collection_Column($row, 1);
Collection_Column($row, 2);
Collection_Column($row, 3);
echo '</div>';

?>



</body>
</html>