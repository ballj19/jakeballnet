<?php
echo '<div class="modal-content">';
echo 	'<span class="close">&times;</span>';
echo 	'<canvas id="diglettChart"></canvas>';
echo '</div>';

$servername = "localhost";
$username = "ballj19_root";
$password = "sitkbm19";
$dbname = "ballj19_critters";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$select_sql = "SELECT `temperature`,`time` FROM `critters` WHERE `index`=3";

$result = $conn->query($select_sql);

$xaxis = array();
$yaxis = array();

foreach($result as $row)
{
    $len = strlen($row['time']);
    $minute = substr($row['time'],$len - 2,2);
    if($len == 2)
    {
        $hour = "00";
    }
    else
    {
        $hour = substr($row['time'],0,$len - 2);
    }
    if($minute == '00' || $minute == '15' || $minute == '30' || $minute == '45')
    {
        $xaxis[] = $hour . ':' . $minute;
        $yaxis[] = $row['temperature'];
    }
}


?>

<script>
var xaxis = <?php echo json_encode($xaxis);?>;
var yaxis = <?php echo json_encode($yaxis);?>;
chart(xaxis,yaxis);

var modal = document.getElementById('diglettModal');

modal.style.display = "block";

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>