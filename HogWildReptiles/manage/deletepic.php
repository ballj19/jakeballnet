<?php
$reptile = $_GET['reptile'];
$file = $_GET['file'];

unlink("../Data/$reptile/Images/$file");
?>