<?php
include 'dbh.php';
session_start();
$email=$_POST['Email'];
$firstName=$_POST['FirstName'];
$lastName=$_POST['LastName'];
$userID=$_POST['UserID'];

// $username="user1";
// $password="password";
$sql = "UPDATE users SET first_name='$firstName',last_name='$lastName',email='$email' WHERE user_id=$userID;";
mysqli_query($conn, $sql);
echo json_encode(array("statusCode"=>200));


?>
