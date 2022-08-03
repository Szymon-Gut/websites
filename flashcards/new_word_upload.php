<?php

session_start();
include "dbConnector.php";
global $conn;
include "validate.php";

$word = validate($_POST['word']);

$translation = validate($_POST['translation']);

$set = $_POST['set'];

$id = $_SESSION['uid'];


mysqli_query($conn,"SET AUTOCOMMIT=0");
mysqli_query($conn,"START TRANSACTION");

$sql = mysqli_query($conn,"INSERT into word (word, meaning) values ('$word', '$translation')");
$sql2 = mysqli_query($conn,"INSERT INTO word_set (word_id, set_id) VALUES ((SELECT id FROM word WHERE word = '$word'), (SELECT id FROM zestaw WHERE name = '$set'))");
$transaction = "Start transaction ". $sql . " " . $sql2. " ". "commit";
if ($sql and $sql2) {
    mysqli_query($conn, "commit");
    echo "git";
} else {
    mysqli_query($conn, "rollback");
    echo 'zle';
}


