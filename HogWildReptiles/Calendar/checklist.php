<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js"></script>
</head>
<body>

<?php

include '../functions.php';
$conn = Database_Connect('reptiles');

$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];

$select_sql = "SELECT name FROM reptiles";

echo $month . '-' . $day . '-' . $year;
?>
<form action="checklist_enter.php" method="post" class="col-xs-12">
<div class="fed">
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $fed_id = $row['name'] . '-fed';
                $ate_id = $row['name'] . '-ate';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="fed-box" id="' . $fed_id . '" name="' . $fed_id . '">';
                echo '<input type="checkbox" class="ate-box" id="' . $ate_id . '" name="' . $ate_id . '">';
                echo '</div>';
        }
?>
</div>
<div class="shed">
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $shed_id = $row['name'] . '-shed';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="shed-box" id="' . $shed_id . '" name="' . $shed_id . '">';
                echo '</div>';
        }
?>
</div>
<div class="weight">
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $weight_id = $row['name'] . '-weight';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="weight-box" id="' . $weight_id . '" name="' . $weight_id . '">';
                echo '</div>';
        }
?>
</div>
<div class="col-xs-12">
            <input id="update-button" type="submit" value="Save">
</div>
</form>
</body>
</html>