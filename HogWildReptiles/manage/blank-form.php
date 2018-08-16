<?php
include '../functions.php';
$parameters = Get_Parameters();
?>

<form class="col-xs-5" id="add-form" action="add.php" method="post">

<?php
    foreach($parameters as $parameter)
    {
        echo '<div class="col-xs-12 parameter">';
        echo    '<div class="col-xs-3 input-label">' . $parameter . '</div>';
        echo    '<input class="col-xs-6 input-box" type="text" id="' . $parameter . '" name="' . $parameter . '" value="">';
        echo '</div>';
    }
        echo '<div class="col-xs-12 parameter">';
        echo    '<div class="col-xs-3 input-label">' . 'background' . '</div>';
        echo '<select class="col-xs-6 input-box" name="background" id="background" value="">';
        $dir = '../My-Collection/backgrounds/';
        $files = scandir($dir);
        for($i = 2; $i < count($files); $i++)
        {
                        echo '<option class="reptile-option" value="' . $files[$i] . '">' . $files[$i] . '</option>';				
        }
        echo '</select>';
        echo '</div>';

?>
        <div class="col-xs-6 col-xs-offset-3">
            <input id="update-button" type="submit" value="Add">
        </div>
</form>
    <div class="col-xs-7">
        <div class="col-xs-12 parameter"> 
            <div class="col-xs-2 input-label">Bio</div>
            <textarea class="col-xs-10" id="bio" name="bio" form="add-form"></textarea>
        </div>
    </div>