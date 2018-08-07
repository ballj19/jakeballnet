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
                $fed = false;
                $cleaned = false;
                $select_result = SQL_SELECT($conn, 'calendar', array('fed', 'cleaned'), array('day', 'month', 'year'), array($day, $month, $year));
                while($row = $select_result->fetch_assoc())
                {
                        if($row['fed'] != '')
                        {
                                $fed = true;
                        }
                        if($row['cleaned'] != '0' && $row['cleaned'] != '')
                        {
                                $cleaned = true;
                        }
                }

                $subclass = 'sub-none';
                
                if($fed && $cleaned)
                {
                        $subclass = 'sub-both';
                }
                else if($fed)
                {
                        $subclass = 'sub-fed';
                }
                else if($cleaned)
                {
                        $subclass = 'sub-cleaned';
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