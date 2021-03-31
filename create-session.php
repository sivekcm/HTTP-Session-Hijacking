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
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $sessionID = '';
    for ($i = 0; $i < 12; $i++) {
      $random_index = rand(0, strlen($characters) - 1);
      $sessionID .= $characters[$random_index];
    }
    $userID = $user['user_id'];
    $sql2 = "UPDATE users SET session_id='$sessionID' WHERE user_id=$userID;";
    mysqli_query($conn, $sql2);
    setcookie("Session_ID", $sessionID, time() + (86400 * 30), "/");
    $_SESSION["user_id"] = $userID;
    echo json_encode(array("statusCode"=>200));
}
else {
    echo json_encode(array("statusCode"=>201));
    echo mysqli_error($conn);
}

?>
