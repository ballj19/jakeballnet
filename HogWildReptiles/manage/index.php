<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="javascript.js"></script>
        <link href="style.css" rel="stylesheet">
        <script src="../Calendar/javascript.js"></script>
        <link href="../Calendar/style.css" rel="stylesheet">
</head>
<body>
<?php
include '../functions.php';
$conn = Database_Connect('reptiles');

$select_sql = "SELECT name FROM reptiles";
$result = $conn->query($select_sql);
?>
        <div class="col-xs-12 reptile-selection">
                        <select class="col-xs-2 col-xs-offset-5 reptile-dropdown" name="reptile" id="reptile" onchange="javascript:GenerateInfo(reptile.value)">
                                <?php
                                        while($row = $result->fetch_assoc())
                                        {
                                                        echo '<option class="reptile-option" value="' . $row['name'] . '">' . $row['name'] . '</option>';				
                                        }
                                ?>
                        </select>
                <button id="add-button" onclick="AddForm()">+</button>
        </div>
        <div class="reptile-info col-xs-12"> 
                <ul class="nav nav-tabs col-xs-12">
                        <li class="active tab-title"><a href="#info" data-toggle="tab">Info</a></li>
                        <li class="tab-title"><a href="#individual-calendar" data-toggle="tab">Calendar</a></li>
                </ul>
                <div class="tab-content col-xs-12">
                        <div class="tab-pane active" id="info">
                                        <div class="col-xs-12" id="reptile-form">
                                        
                                        </div>
                        </div>
                        <div class="tab-pane" id="individual-calendar">
                                <div id="dropdown-date">

                                </div>
                                <div class="col-xs-10 col-xs-offset-1" id="calendar">

                                </div>
                        </div> 
                </div>
        </div> 
        <script>
                GenerateInfo(reptile.value); //Run once so the first reptile is shown
        </script>
</body>
</html>