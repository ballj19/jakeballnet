<?php
$id = $_GET['id'];

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
$conn = Database_Connect('reptiles');

$select_sql = "SELECT * FROM herping WHERE id='" . $id . "'";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();

$parameters = Get_Parameters('herping');

?>
<form class="col-xs-5" id="manage-form" action="php/update.php?id=<?php echo $row['id']?>" method="post">
<?php
    foreach($parameters as $parameter)
    {
        echo '<div class="col-xs-12 parameter">';
        echo    '<div class="col-xs-3 input-label">' . $parameter . '</div>';
        echo    '<input class="col-xs-6 input-box" type="text" id="' . $parameter . '" name="' . $parameter . '" value="' . $row[$parameter] . '">';
        echo '</div>';
    }

?>

        <div class="col-xs-6">
            <input id="update-button" type="submit" value="Update">
        </div>
        <a class="col-xs-6" href="<?php echo "php/delete.php?id=" . $id;?>"><div id="delete-button">Delete</div></a>
</form>
    <div class="col-xs-7">
        <div class="col-xs-12 parameter"> 
            <div class="col-xs-2 input-label">Bio</div>
            <textarea class="col-xs-10" id="bio" name="bio" form="manage-form"><?php echo $row['bio'];?></textarea>
        </div>
    </div>