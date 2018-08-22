<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <script src="javascript.js"></script>
        <link href="style.css" rel="stylesheet">
        <script src="../Calendar/javascript.js"></script>
        <link href="../Calendar/style.css" rel="stylesheet">
        <link href="../nav.css" rel="stylesheet">
</head>
<body>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
Nav_Bar('../');
$conn = Database_Connect('reptiles');

$id = '';
if(isset($_GET['id']))
{
        $id = $_GET['id'];
}

$select_sql = "SELECT id, name FROM herping";
$result = $conn->query($select_sql);
?>
        <div class="col-xs-12 herping-selection">
                        <select class="col-xs-2 col-xs-offset-5 herping-dropdown" name="herping" id="herping" onchange="javascript:GenerateInfo(herping.value)">
                                <?php
                                        while($row = $result->fetch_assoc())
                                        {
                                                        echo '<option class="herping-option" value="' . $row['id'] . '">' . $row['name'] . '</option>';				
                                        }
                                ?>
                        </select>
                <button id="add-button" onclick="AddForm()">+</button>
        </div>
        <div class="herping-info col-xs-12"> 
                <ul class="nav nav-tabs col-xs-12">
                        <li class="active tab-title" id="info-tab"><a href="#info" data-toggle="tab">Info</a></li>
                        <li class="tab-title" id="pictures-tab"><a href="#individual-pics" data-toggle="tab">Pictures</a></li>
                </ul>
                <div class="tab-content col-xs-12">
                        <div class="tab-pane active" id="info">
                                <div class="col-xs-12" id="herping-form">
                                
                                </div>
                        </div>
                        <div class="tab-pane" id="individual-pics">
                                <div class="col-xs-10 col-xs-offset-1" id="individual-pics">

                                </div>
                        </div>  
                </div>
        </div> 

<?php
if(isset($_GET['id']))
{
        echo '<script>';
                echo "document.getElementById('herping').value = '" . $id . "';";
        echo '</script>';
}
?>

<script>
        GenerateInfo(herping.value); //Run once so the first herping is shown
</script>
</body>
</html>