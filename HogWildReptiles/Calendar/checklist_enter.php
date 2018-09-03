<?php

include '../functions.php';
$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];

$conn = Database_Connect('reptiles');

$select_sql = "SELECT name,iid FROM calendar";
$select_sql .= " WHERE day='" . $day . "' AND month='" . $month . "' AND year='" . $year . "'";
$result = $conn->query($select_sql);
$today = array();
while($row = $result->fetch_assoc())
{
        $today[] = $row['iid'];
}

$select_sql = "SELECT name,id FROM reptiles";
$result = $conn->query($select_sql);
$iids = array();
$names = array();
while($row = $result->fetch_assoc())
{
        $iids[] = $row['id'];
        $names[] = $row['name'];
}

for($i = 0; $i < count($iids); $i++)
{
        $name = $names[$i];
        $iid = $iids[$i];
        $parameters = array('fed','ate','cleaned','shed','weight','length','notes');
        $param_size = count($parameters);

        $fed = $_POST[$iid . '-fed'];
        $ate = $_POST[$iid . '-ate'];
        $shed = $_POST[$iid . '-shed'];
        $cleaned = $_POST[$iid . '-cleaned'];
        $weight = $_POST[$iid . '-weight'];
        $length = $_POST[$iid . '-length'];
        $notes = $_POST[$iid . '-notes'];

        if(in_array($iid,$today))
        {
                $values = array();
                for($j = 0; $j < count($parameters) ;$j++)
                {
                        $values[$j] = $_POST[$iid . '-' . $parameters[$j]];
                }
                $conditions = array('iid','day','month','year');
                $conditions_values = array($iid, $day, $month, $year);

                SQL_UPDATE($conn, 'calendar',$parameters,$values,$conditions,$conditions_values);
        }
        else
        {
                //Only insert if at least one entry has been filled out
                if($fed != '' || $shed != '0' || $cleaned != '0' || $weight != '' || $length != '' || $notes != '')
                {
                        $columns = array('day','month','year','iid','name');
                        for($j = 0; $j < count($parameters) ;$j++)
                        {
                                $columns[] = $parameters[$j];
                        }
                        $values = array($day, $month, $year, $iid, $name);
                        for($j = 0; $j < count($parameters) ;$j++)
                        {
                                $values[] = $_POST[$iid . '-' . $parameters[$j]];
                        }
                        SQL_INSERT($conn, 'calendar',$columns,$values);
                }
        }
}


echo "<script>window.location = 'checklist.php?day=" . $day . '&month=' . $month . '&year=' . $year . "'</script>";

?>