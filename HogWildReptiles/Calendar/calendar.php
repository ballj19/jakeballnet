<?php

include '../functions.php';
$conn = Database_Connect('reptiles');

$month = $_GET['month'];
$year = $_GET['year'];

$num_of_days = date('t',mktime(0,0,0,$month,1,$year));
$weekdays = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

for($weekday = 0; $weekday <= 6; $weekday++)
{
        $firstdayfound = false;
        echo '<div class="weekday" id="weekday-' . $weekday . '">';
        echo '<div class="weekday-name">' . $weekdays[$weekday] . '</div>';
        for($day = 1; $day <= $num_of_days; $day++)
        {
                $cleaned = false;
                $frequent_eater = false;
                $infrequent_eater = false;
                $select_result = SQL_SELECT($conn, 'calendar', array('name', 'fed', 'cleaned'), array('day', 'month', 'year'), array($day, $month, $year));
                while($row = $select_result->fetch_assoc())
                {
                        if($row['fed'] != '')
                        {
                                $eater_result = SQL_SELECT($conn, 'reptiles', array('frequentEater'), array('name'), array($row['name']));
                                $eater_row = $eater_result->fetch_assoc();
                                $eater = $eater_row['frequentEater'];

                                if($eater != '0' && $eater != '')
                                {
                                        $frequent_eater = true;
                                }
                                else
                                {
                                        $infrequent_eater = true;
                                }
                        }
                        if($row['cleaned'] != '0' && $row['cleaned'] != '')
                        {
                                $cleaned = true;
                        }
                }

                $subclass = 'sub-none';
                
                if($cleaned && $frequent_eater && $infrequent_eater)
                {
                        $subclass = 'sub-1';
                }
                else if($cleaned && $frequent_eater)
                {
                        $subclass = 'sub-2';
                }
                else if($cleaned && $infrequent_eater)
                {
                        $subclass = 'sub-3';
                }
                else if($frequent_eater && $infrequent_eater)
                {
                        $subclass = 'sub-4';
                }
                else if($cleaned)
                {
                        $subclass = 'sub-5';
                }
                else if($frequent_eater)
                {
                        $subclass = 'sub-6';
                }
                else if($infrequent_eater)
                {
                        $subclass = 'sub-7';
                }


                if($weekday == date('w',mktime(0,0,0,$month,$day,$year)))
                {
                        if(($weekday + 1) < $day && !$firstdayfound)
                        {
                                echo '<div class="blank-day"></div>';
                        }
                        echo '<a href="checklist.php?day=' . $day . '&month=' . $month . '&year=' . $year . '">';
                        echo '<div class="day ' . $subclass . '">' . $day . '</div>';
                        echo '</a>';
                        $firstdayfound = true;
                }
        }
        echo '</div>';
}
?>

<script>
        ResizeCalendar();
</script>