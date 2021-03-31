<?php
$conn = mysqli_connect('localhost', 'root', 'password', 'session_hijack', '3307');
if (!$conn) {
    die(mysqli_connect_error());
  }
?>
