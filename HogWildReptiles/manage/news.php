<?php 
if((isset($_COOKIE['admin'])&& !isset($_GET['pw'])) || $_GET['pw'] == '0619')
{
        $cookie_name = "admin";
        $cookie_value = "1";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>  

<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <script src="javascript.js"></script>
        <link href="style.css" rel="stylesheet">
        <link href="../nav.css" rel="stylesheet">
        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
</head>
<body>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
Nav_Bar('../', true);
Manage('news',array(1,0,1,0,0));
?>
</body>
</html>
<?php
}       //Ends the if/else at the top of page
else {
        echo 'You do not have permission to view this page';
}    //Ends the if/else at the top of page
?>