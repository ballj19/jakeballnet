<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="javascript.js"></script>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rallyreptiles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$select_sql = "SELECT name FROM reptiles";
$result = $conn->query($select_sql);
?>
        <form javascript:ReptileForm(reptile.value)>
                <select name="reptile" id="reptile">
                        <?php
                                while($row = $result->fetch_assoc())
                                {
                                        	echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';				
                                }
                        ?>
                </select>
                <br><br>
                <input id="submit-button" type="submit" value="Manage">
        </form>
        <div class="col-xs-8 col-xs-offset-2" id="reptile-form">
        
        </div>
</body>
</html>