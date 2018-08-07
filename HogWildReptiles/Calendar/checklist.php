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
echo '<a class="calendar-return" href="index.php">Return to Calendar</a>';
echo $month . '-' . $day . '-' . $year;

$enter_string = 'checklist_enter.php?' . 'day=' . $day . '&month=' . $month . '&year=' . $year;
?>
<form action="<?php echo $enter_string;?>" method="post" class="col-xs-12">
<div class="fed-column">
<div class="checklist-row fed-title">Fed</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $select_result = SQL_SELECT($conn, 'calendar', array('fed', 'ate'), array('day', 'month', 'year', 'name'), array($day, $month, $year, $row['name']));
                $select_row = $select_result->fetch_assoc();
                $fed_id = $row['name'] . '-fed';
                $ate_id = $row['name'] . '-ate';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="check-text" id="' . $fed_id . '" name="' . $fed_id . '" value="' . $select_row['fed'] . '">';
                echo '<input type="hidden" value="0" name="' . $ate_id . '">';
                echo '<input type="checkbox" class="ate-box" id="' . $ate_id . '" name="' . $ate_id . ($select_row['ate'] == "on" ? '" checked' : '" ') . '>';
                echo '</div>';
        }
?>
</div>
<div class="cleaned-column">
<div class="checklist-row cleaned-title">Cleaned</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $select_result = SQL_SELECT($conn, 'calendar', array('cleaned'), array('day', 'month', 'year', 'name'), array($day, $month, $year, $row['name']));
                $select_row = $select_result->fetch_assoc();
                $cleaned_id = $row['name'] . '-cleaned';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="hidden" value="0" name="' . $cleaned_id . '">';
                echo '<input type="checkbox" class="ate-box" id="' . $cleaned_id . '" name="' . $cleaned_id . ($select_row['cleaned'] == "on" ? '" checked' : '" ') . '>';
                echo '</div>';
        }
?>
</div>
<div class="shed-column">
<div class="checklist-row shed-title">Shed</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $select_result = SQL_SELECT($conn, 'calendar', array('shed'), array('day', 'month', 'year', 'name'), array($day, $month, $year, $row['name']));
                $select_row = $select_result->fetch_assoc();
                $shed_id = $row['name'] . '-shed';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="hidden" value="0" name="' . $shed_id . '">';
                echo '<input type="checkbox" class="ate-box" id="' . $shed_id . '" name="' . $shed_id . ($select_row['shed'] == "on" ? '" checked' : '" ') . '>';
                echo '</div>';
        }
?>
</div>
<div class="weight-column">
<div class="checklist-row weight-title">Weight</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        { 
                $select_result = SQL_SELECT($conn, 'calendar', array('weight'), array('day', 'month', 'year', 'name'), array($day, $month, $year, $row['name']));
                $select_row = $select_result->fetch_assoc();
                $weight_id = $row['name'] . '-weight';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="small-check-text" id="' . $weight_id . '" name="' . $weight_id . '" value="' . $select_row['weight'] . '">';
                echo '</div>';
        }
?>
</div>
<div class="length-column">
<div class="checklist-row length-title">Length</div>
<?php
        $result = $conn->query($select_sql);
        while($row = $result->fetch_assoc())
        {
                $select_result = SQL_SELECT($conn, 'calendar', array('length'), array('day', 'month', 'year', 'name'), array($day, $month, $year, $row['name']));
                $select_row = $select_result->fetch_assoc();
                $length_id = $row['name'] . '-length';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="small-check-text" id="' . $length_id . '" name="' . $length_id . '" value="' . $select_row['length'] . '">';
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
                $select_result = SQL_SELECT($conn, 'calendar', array('notes'), array('day', 'month', 'year', 'name'), array($day, $month, $year, $row['name']));
                $select_row = $select_result->fetch_assoc();
                $notes_id = $row['name'] . '-notes';
                echo '<div class="checklist-row">';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<input type="text" class="notes-text" id="' . $notes_id . '" name="' . $notes_id . '" value="' . $select_row['notes'] . '">';
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