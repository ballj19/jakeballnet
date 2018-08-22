<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
$parameters = Get_Parameters();
?>

<form class="col-xs-5" id="add-form" action="php/add.php" method="post">

<?php
    foreach($parameters as $parameter)
    {
        echo '<div class="col-xs-12 parameter">';
        echo    '<div class="col-xs-3 input-label">' . $parameter . '</div>';
        echo    '<input class="col-xs-6 input-box" type="text" id="' . $parameter . '" name="' . $parameter . '" value="">';
        echo '</div>';
    }

    $options = array();
    $dir = "$root/My-Collection/backgrounds/";
    $files = array_values(array_diff(scandir($dir), array('.', '..','md')));
    for($i = 0; $i < count($files); $i++)
    {
        $options[] = $files[$i];
    }
    Dropdown_Parameter('background', $options, '');
    Dropdown_Parameter('sex',array('male','female','unknown'), '');

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