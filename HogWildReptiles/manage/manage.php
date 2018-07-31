<?php
$_reptile = $_GET['name'];
$reptile = str_replace("%"," ",$_reptile);

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

$select_sql = "SELECT * FROM reptiles WHERE name='" . $reptile . "'";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();

?>

<form class="col-xs-5" id="manage-form" action="update.php" method="post">
        <div class="col-xs-12 parameter">
            <div class="col-xs-2 input-label">Name</div>
            <input class="col-xs-6 input-box" type="text" id="name" name="name" value="<?php echo $row['name'];?>" readonly>
        </div>

        <div class="col-xs-12 parameter">
            <div class="col-xs-2 input-label">Type</div>
            <input class="col-xs-6 input-box" type="text" id="type" name="type" value="<?php echo $row['type'];?>">
        </div>

        <div class="col-xs-6 col-xs-offset-3">
            <input id="update-button" type="submit" value="Update">
        </div>
</form>
    <div class="col-xs-7">
        <div class="col-xs-12 parameter"> 
            <div class="col-xs-2 input-label">Bio</div>
            <textarea class="col-xs-10" id="bio" name="bio" form="manage-form"><?php echo $row['bio'];?></textarea>
        </div>
    </div>