<?php
include "dbConnector.php";
global $conn;
include "validate.php";

$uid = validate($_POST['uname']);
$pw = validate($_POST['password']);

$sql = "SELECT * FROM users WHERE (email='$uid' OR login='$uid') AND password='$pw'";

$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) == 1) {
    session_start();
    $_SESSION['sid'] = session_id();
    $_SESSION['uid'] = mysqli_fetch_array($results)['id'];
    echo "true";
} else {
    echo "false";
}


