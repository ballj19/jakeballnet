<?php 
if(!isset($_GET['pw']) || $_GET['pw'] != '0619')
{
        echo 'You do not have permission to view this page';
}

else {
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
</head>
<body>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/functions.php";
Nav_Bar('../', true);
Manage('news',array(1,0,1,1));
?>
</body>
</html>
<?php
}       //Ends the if/else at the top of page
?>