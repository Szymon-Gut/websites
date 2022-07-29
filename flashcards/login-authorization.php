<?php
function validate($data)
{

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

}
$uid = validate($_POST['uname']);
$pw = validate($_POST['password']);

$sname = "127.0.0.1";

$unmae = "root";

$password = 123456;

$db_name = "flashcards";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

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


