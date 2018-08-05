<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
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

$enter_string = 'checklist_enter.php?' . 'day=' . $day . '&month=' . $month . '&year=' . $year;
?>
<form action="<?php echo $enter_string;?>" method="post" class="col-xs-12">
<div class="check-column">
<div class="checklist-row col-title">Fed</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $fed_id = $row['name'] . '-fed';
                $ate_id = $row['name'] . '-ate';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="check-text" id="' . $fed_id . '" name="' . $fed_id . '">';
                
                echo '<input type="hidden" value="0" name="' . $ate_id . '">';
                echo '<input type="checkbox" class="ate-box" id="' . $ate_id . '" name="' . $ate_id . '">';
                echo '</div>';
        }
?>
</div>
<div class="check-column">
<div class="checklist-row col-title">Shed</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $shed_id = $row['name'] . '-shed';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="check-text" id="' . $shed_id . '" name="' . $shed_id . '">';
                echo '</div>';
        }
?>
</div>
<div class="check-column">
<div class="checklist-row col-title">Weight</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $weight_id = $row['name'] . '-weight';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="check-text" id="' . $weight_id . '" name="' . $weight_id . '">';
                echo '</div>';
        }
?>
</div>
<div class="check-column">
<div class="checklist-row col-title">Length</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $length_id = $row['name'] . '-length';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="check-text" id="' . $length_id . '" name="' . $length_id . '">';
                echo '</div>';
        }
?>
</div>
<div class="notes-column">
<div class="checklist-row notes-title">Notes</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $notes_id = $row['name'] . '-notes';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="notes-text" id="' . $notes_id . '" name="' . $notes_id . '">';
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