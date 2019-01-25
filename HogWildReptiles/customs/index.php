<?php

include 'functions.php';

$html = file_get_contents('example.text');

for($i = 0; $i < 10; $i++)
{
        GetStats($html, $i);
}
?>