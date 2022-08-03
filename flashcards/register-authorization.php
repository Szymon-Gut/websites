<?php

include "dbConnector.php";
global $conn;
include "validate.php";

$date = $_POST['date'];

$email = validate($_POST['email']);

$uid = validate($_POST['uname']);

$pw = validate($_POST['password']);


$sql = "INSERT into users (email, login, password, birth) values ('$email', '$uid', '$pw', '$date')";

$sql2 = "SELECT * FROM users WHERE (email='$uid' OR login='$uid') AND password='$pw'";

if (!mysqli_query($conn, $sql)) {
    echo "false";
} else {
    $results = mysqli_query($conn, $sql2);
    session_start();
    $_SESSION['sid'] = session_id();
    $_SESSION['uid'] = mysqli_fetch_array($results)['id'];
    header("Location: index.php?param=".$_SESSION['uid']);

}


