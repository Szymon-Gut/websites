<?php
session_start();
include "dbConnector.php";
global $conn;
include "validate.php";

$name = validate($_POST['name']);

$descr = validate($_POST['description']);

$id = $_SESSION['uid'];

$sql = "INSERT into zestaw (name, user_id, description) values ('$name', '$id', '$descr')";

if (!mysqli_query($conn, $sql)) {
    echo "false";
} else {
    header("Location: index.php");

}
