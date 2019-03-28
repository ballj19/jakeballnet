<?php
$id = $_GET['id'];
$table = $_GET['table'];

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
$conn = Database_Connect('reptiles');

$select_sql = "SELECT * FROM $table WHERE id='" . $id . "'";
$result = $conn->query($select_sql);
$row = $result->fetch_assoc();

$parameters = Get_Parameters($table);

?>
<form class="col-xs-5" id="manage-form" action="php/update.php?id=<?php echo $row['id'];?>&table=<?php echo $table;?>" method="post">
<?php
    foreach($parameters as $parameter)
    {
        echo '<div class="col-xs-12 parameter">';
        echo    '<div class="col-xs-3 input-label">' . $parameter . '</div>';
        echo    '<input class="col-xs-6 input-box" type="text" id="' . $parameter . '" name="' . $parameter . '" value="' . $row[$parameter] . '">';
        echo '</div>';
    }
    
    if($table == 'reptiles')
    {
        $options = array();
        $dir = "$root/My-Collection/backgrounds/";
        $files = array_values(array_diff(scandir($dir), array('.', '..','md')));
        for($i = 0; $i < count($files); $i++)
        {
            $options[] = $files[$i];
        }
        Dropdown_Parameter('background', $options, $row['background']);
        Dropdown_Parameter('sex',array('male','female','unknown'), $row['sex']);
    }
?>

        <div class="col-xs-6">
            <input id="update-button" type="submit" value="Update">
        </div>
        <a class="col-xs-6" href="<?php echo "php/delete.php?id=" . $id;?>&table=<?php echo $table;?>"><div id="delete-button">Delete</div></a>
</form>
    <div class="col-xs-12">
        <div class="col-xs-12 parameter"> 
            <div class="col-xs-2 input-label">Bio</div>
            <textarea class="col-xs-10" id="bio" name="bio" form="manage-form"><?php echo $row['bio'];?></textarea>
        </div>
    </div>


<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>

<script> tinymce.init({
        selector: "textarea",  // change this value according to your HTML
        plugins: 'fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help',
        toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
        image_advtab: true,
      });
      </script>