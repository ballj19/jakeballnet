<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
        <link href="../nav.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="javascript.js"></script>
</head>
<body>
<?php

include '../functions.php';
$conn = Database_Connect('reptiles');

Nav_Bar('../');

$result = SQL_SELECT($conn,'herping',array('id','name','coverPhoto'));

$row = array();
while($rows = $result->fetch_assoc())
{
    $row[] = $rows;
}
$col_array = Arrange_Collage($row, 'herping');
echo '<div class="collection-row">';
Collection_Column($col_array, $row, 0, 'herping');
Collection_Column($col_array, $row, 1, 'herping');
Collection_Column($col_array, $row, 2, 'herping');
Collection_Column($col_array, $row, 3, 'herping');
echo '</div>';

?>



</body>
</html>