<?php

include '../functions.php';
$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];

$conn = Database_Connect('reptiles');

$select_sql = "SELECT name FROM calendar";
$select_sql .= " WHERE day='" . $day . "' AND month='" . $month . "' AND year='" . $year . "'";
$result = $conn->query($select_sql);
$today = array();
while($row = $result->fetch_assoc())
{
        $today[] = $row['name'];
}

$select_sql = "SELECT name FROM reptiles";
$result = $conn->query($select_sql);
$names = array();
while($row = $result->fetch_assoc())
{
        $names[] = $row['name'];
}

foreach($names as $name_original)
{
        $parameters = array('fed','ate','cleaned','shed','weight','length','notes');
        $param_size = count($parameters);

        $name = str_replace('.','_',$name_original);

        $fed = $_POST[$name . '-fed'];
        $ate = $_POST[$name . '-ate'];
        $shed = $_POST[$name . '-shed'];
        $cleaned = $_POST[$name . '-cleaned'];
        $weight = $_POST[$name . '-weight'];
        $length = $_POST[$name . '-length'];
        $notes = $_POST[$name . '-notes'];

        if(in_array($name_original,$today))
        {
                $values = array();
                for($i = 0; $i < count($parameters) ;$i++)
                {
                        $values[$i] = $_POST[$name . '-' . $parameters[$i]];
                }
                $conditions = array('name','day','month','year');
                $conditions_values = array($name_original, $day, $month, $year);

                SQL_UPDATE($conn, 'calendar',$parameters,$values,$conditions,$conditions_values);
        }
        else
        {
                //Only insert if at least one entry has been filled out
                if($fed != '' || $shed != '0' || $cleaned != '0' || $weight != '' || $length != '' || $notes != '')
                {
                        $columns = array('day','month','year','name');
                        for($i = 0; $i < count($parameters) ;$i++)
                        {
                                $columns[] = $parameters[$i];
                        }
                        $values = array($day, $month, $year, $name_original);
                        for($i = 0; $i < count($parameters) ;$i++)
                        {
                                $values[] = $_POST[$name . '-' . $parameters[$i]];
                        }
                        SQL_INSERT($conn, 'calendar',$columns,$values);
                }
        }
}


echo "<script>window.location = 'checklist.php?day=" . $day . '&month=' . $month . '&year=' . $year . "'</script>";

?>