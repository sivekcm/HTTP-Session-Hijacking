<?php
include 'dbh.php';
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
// $username="user1";
// $password="password";
$sql = "SELECT user_id FROM users WHERE email='$email' AND password='$password';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  $user = mysqli_fetch_assoc($result);
    $_SESSION["user_id"] = $user['user_id'];
    echo json_encode(array("statusCode"=>200));
}
else {
    echo json_encode(array("statusCode"=>201));
    echo mysqli_error($conn);
}

?>
