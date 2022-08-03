<?php
session_start();
$id = $_SESSION['uid'];
$target_file = "avatars/".$id.".jpg";

if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
    header('Location: profile.php');
} else {
    echo 'false';

}