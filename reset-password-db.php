<?php
include 'dbh.php';
session_start();
$userID = $_POST['UserID'];
$pass=$_POST['Pass'];
$sql = "UPDATE users SET password='$pass' WHERE user_id=$userID;";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
    echo mysqli_error($conn);
}

?>
