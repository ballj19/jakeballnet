<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="javascript.js"></script>
        <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
include '../functions.php';
$conn = Database_Connect('reptiles');

$select_sql = "SELECT name FROM reptiles";
$result = $conn->query($select_sql);
?>
        <div class="col-xs-12 reptile-selection">
                        <select class="col-xs-2 col-xs-offset-5 reptile-dropdown" name="reptile" id="reptile" onchange="javascript:ReptileForm(reptile.value)">
                                <?php
                                        while($row = $result->fetch_assoc())
                                        {
                                                        echo '<option class="reptile-option" value="' . $row['name'] . '">' . $row['name'] . '</option>';				
                                        }
                                ?>
                        </select>
                <button id="add-button" onclick="AddForm()">+</button>
        </div>
        <div class="col-xs-12" id="reptile-form">
        
        </div>
        <script>
                ReptileForm(reptile.value); //Run once so the first reptile is shown
        </script>
</body>
</html>