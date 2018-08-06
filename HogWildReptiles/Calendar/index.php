<?php
include '../functions.php';
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js"></script>
</head>
<body>
<select class="col-xs-1 col-xs-offset-5" name="month" id="month" onchange="javascript:GenerateCalendar()">
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
<select class="col-xs-1" name="year" id="year" onchange="javascript:GenerateCalendar()">
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
<div class="col-xs-8 col-xs-offset-2" id="calendar">

</div>
</body>
</head>