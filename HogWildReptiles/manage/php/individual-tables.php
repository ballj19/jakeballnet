<?php
$id = $_GET['id'];

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
$conn = Database_Connect('reptiles');
?>
<?php

$result = SQL_SELECT($conn, 'calendar', array('name'), array('iid'), array($id));
$row = $result->fetch_assoc();
$name = $row['name'];

$result = SQL_SELECT($conn,'calendar',array('*'), array('name'), array($name));

$weights = array();
$lengths = array();
$notes = array();
$sheds = array();

while($row = $result->fetch_assoc())
{
        $date = $row['month'] . '-' . $row['day'] . '-' . $row['year'];

        if($row['weight'] != '')
        {
                $weights[] = new DateValuePair($date, $row['weight']);
        }
        if($row['length'] != '')
        {
                $lengths[] = new DateValuePair($date, $row['length']);
        }
        if($row['notes'] != '')
        {
                $notes[] = new DateValuePair($date, $row['notes']);
        }
        if($row['shed'] == 'on')
        {
                $sheds[] = new DateValuePair($date, 'Yes');
        }
}

Display_Table('Weight',$weights);
Display_Table('Length',$lengths);
Display_Table('Notes',$notes);
Display_Table('Shed',$sheds);

class DateValuePair
{
        public $date;
        public $value;

        function __construct($_date,$_value)
        {
                $this->date = $_date;
                $this->value = $_value;
        }
}
?>