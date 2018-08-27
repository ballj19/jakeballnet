<?php

$id = '';

if(isset($_GET['id']))
{
        $id = $_GET['id'];
}
?>

<select class="col-xs-1 col-xs-offset-5" name="month" id="month" onchange="javascript:GenerateCalendar('<?php echo $id; ?>')">
        <?php
                $month = date('n');
                for($i = 1;$i <= 12; $i++)
                {
                        if($i == $month)
                        {
                                echo '<option selected="selected" class="month-option" value="' . $i . '">' . $i . '</option>';
                        }
                        else
                        {  
                                echo '<option class="month-option" value="' . $i . '">' . $i . '</option>';
                        }        				
                }
        ?>
</select>
<select class="col-xs-1" name="year" id="year" onchange="javascript:GenerateCalendar('<?php echo $id; ?>')">
        <?php
                $year = date('Y');
                for($i = 2018; $i <= 2118; $i++)
                {
                        if($i == $year)
                        {
                                echo '<option selected="selected" class="year-option" value="' . $i . '">' . $i . '</option>';
                        }
                        else
                        {
                                echo '<option class="year-option" value="' . $i . '">' . $i . '</option>';
                        }     				
                }
        ?>
</select>
<?php 
echo '<script>';
echo 'GenerateCalendar("' . $id . '");';
echo '</script>';
?>