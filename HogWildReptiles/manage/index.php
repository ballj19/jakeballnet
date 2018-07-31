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
		$servername = "localhost";
		$username = "ballj19_root";
		$password = "sitkbm19";
                $dbname = "ballj19_reptiles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$select_sql = "SELECT name FROM reptiles";
$result = $conn->query($select_sql);
?>
        <div class="col-xs-12">
                <form class="reptile-select-form" action="javascript:ReptileForm(reptile.value)">
                        <select class="col-xs-2 col-xs-offset-5 reptile-dropdown" name="reptile" id="reptile">
                                <?php
                                        while($row = $result->fetch_assoc())
                                        {
                                                        echo '<option class="reptile-option" value="' . $row['name'] . '">' . $row['name'] . '</option>';				
                                        }
                                ?>
                        </select>
                        <input id="select-submit-button" type="submit" value="Manage">
                </form>
                <button id="add-button" onclick="AddForm()">+</button>
        </div>
        <div class="col-xs-8 col-xs-offset-2" id="reptile-form">
        
        </div>
</body>
</html>