<?php
include 'dbh.php';
session_start();
$email=$_POST['email'];
$password=$_POST['password'];


$sql = "SELECT user_id FROM users WHERE email='$email' AND password='$password';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  //https://www.geeksforgeeks.org/generating-random-string-using-php/
    $user = mysqli_fetch_assoc($result);
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $sessionID = '';
    for ($i = 0; $i < 12; $i++) {
      $random_index = rand(0, strlen($characters) - 1);
      $sessionID .= $characters[$random_index];
    }

    $cipher = "aes-128-gcm";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($sessionID, $cipher, $key, $options=0, $iv, $tag);

    $userID = $user['user_id'];
    $sql2 = "UPDATE users SET session_id='$ciphertext' WHERE user_id=$userID;";
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
