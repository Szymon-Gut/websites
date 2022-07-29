<?php
function validate($data)
{

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

}
$date = $_POST['date'];

$email = validate($_POST['email']);

$uid = validate($_POST['uname']);

$pw = validate($_POST['password']);

$sname = "127.0.0.1";

$unmae = "root";

$password = 123456;

$db_name = "flashcards";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

$sql = "INSERT into users (email, login, password, birth) values ('$email', '$uid', '$pw', '$date')";

if (!mysqli_query($conn, $sql)) {
    echo "false";
} else {
    session_start();
    $_SESSION['sid'] = session_id();
    header("Location: index.php");

}


