<?php
$reptile = $_GET['reptile'];
$file = $_GET['file'];

unlink("../Data/$reptile/Images/$file");
unlink("../Data/$reptile/Images/md/$file");
?>