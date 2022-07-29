<?php
function validate($data)
{

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

}
$email = validate($_POST['email']);
$sname = "127.0.0.1";

$unmae = "root";

$password = 123456;

$db_name = "newsletter";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

$sql = "INSERT INTO mail (emails) values ('$email')";

$results = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) == -1) {
 echo "this email has been already used.";
} else {
    echo "correct";
}
?>