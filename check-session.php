<?php
include 'dbh.php';
session_start();
$sessionID = $_POST['id'];
$sql = "SELECT user_id FROM users WHERE session_id='$sessionID';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  //https://www.geeksforgeeks.org/generating-random-string-using-php/
    $user = mysqli_fetch_assoc($result);
    $userID = $user['user_id'];
    $_SESSION["user_id"] = $userID;
    echo json_encode(array("statusCode"=>200));
}
else {
    echo json_encode(array("statusCode"=>201));
    echo mysqli_error($conn);
}

?>
