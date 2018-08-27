<?php

include 'functions.php';

$conn = Database_Connect('reptiles');

$select_sql = "SELECT name,id FROM reptiles";

$result = $conn->query($select_sql);
while($row = $result->fetch_assoc())
{
        SQL_UPDATE($conn, 'calendar', array('iid'), array($row['id']),array('name'), array($row['name']));
}

SQL_UPDATE($conn, 'calendar', array('iid'), array(12),array('name'), array('AdamHenry'));
SQL_UPDATE($conn, 'calendar', array('iid'), array(11),array('name'), array('TankJr'));
SQL_UPDATE($conn, 'calendar', array('iid'), array(14),array('name'), array('LilBro'));
SQL_UPDATE($conn, 'calendar', array('iid'), array(10),array('name'), array('Mr.Snake'));