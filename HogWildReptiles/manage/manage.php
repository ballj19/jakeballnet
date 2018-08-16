<?php
$_reptile = $_GET['name'];
$reptile = str_replace("%"," ",$_reptile);

include '../functions.php';
$conn = Database_Connect('reptiles');

$select_sql = "SELECT * FROM reptiles WHERE name='" . $reptile . "'";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();

$parameters = Get_Parameters();

?>
<form class="col-xs-5" id="manage-form" action="update.php" method="post">
<?php
    foreach($parameters as $parameter)
    {
        echo '<div class="col-xs-12 parameter">';
        echo    '<div class="col-xs-3 input-label">' . $parameter . '</div>';
        echo    '<input class="col-xs-6 input-box" type="text" id="' . $parameter . '" name="' . $parameter . '" value="' . $row[$parameter] . '">';
        echo '</div>';
    }
    
    echo '<div class="col-xs-12 parameter">';
    echo    '<div class="col-xs-3 input-label">' . 'background' . '</div>';
    echo '<select class="col-xs-6 input-box" name="background" id="background" value="">';
    $dir = '../My-Collection/backgrounds/';
    $files = scandir($dir);
    for($i = 2; $i < count($files); $i++)
    {
        if($files[$i] == $row['background'])
        {
            echo '<option class="reptile-option" value="' . $files[$i] . '" selected>' . $files[$i] . '</option>';
        }
        else
        {
            echo '<option class="reptile-option" value="' . $files[$i] . '">' . $files[$i] . '</option>';
        }
    }
    echo '</select>';
    echo '</div>';
?>

        <div class="col-xs-6">
            <input id="update-button" type="submit" value="Update">
        </div>
        <a class="col-xs-6" href="<?php echo "delete.php?name=" . $_reptile;?>"><div id="delete-button">Delete</div></a>
</form>
    <div class="col-xs-7">
        <div class="col-xs-12 parameter"> 
            <div class="col-xs-2 input-label">Bio</div>
            <textarea class="col-xs-10" id="bio" name="bio" form="manage-form"><?php echo $row['bio'];?></textarea>
        </div>
    </div>