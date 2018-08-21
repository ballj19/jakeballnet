<?php
$herping = $_GET['herping'];
$file = $_GET['file'];

unlink("../HerpingData//$herping/Images/$file");
unlink("../HerpingData//$herping/Images/md/$file");
?>