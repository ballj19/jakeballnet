<?php

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
                if($weekday == date('w',mktime(0,0,0,$month,$day,$year)))
                {
                        if(($weekday + 1) < $day && !$firstdayfound)
                        {
                                echo '<div class="blank-day"></div>';
                        }
                        echo '<a href="checklist.php?day=' . $day . '&month=' . $month . '&year=' . $year . '">';
                        echo '<div class="day">' . $day . '</div>';
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