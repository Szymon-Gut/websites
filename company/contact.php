<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//require 'PHPMailer/src/Exception.php';
//require 'PHPMailer/src/PHPMailer.php';
//require 'PHPMailer/src/SMTP.php';
function validate($data)
{

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

}


$name = validate($_POST['name']);

$contactEmail = validate($_POST['email']);

$comment = validate($_POST['comments']);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists. ";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large. ";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "html" && $imageFileType != "pdf" && $imageFileType != "docx") {
    echo "Sorry, only html, pdf, docx files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $name=$target_dir.'cv'.date('m-d-Y_hiasu').".".$imageFileType;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $name)) {
        $sname = "127.0.0.1";

        $unmae = "root";

        $password = 123456;

        $db_name = "contact";

        $conn = mysqli_connect($sname, $unmae, $password, $db_name);

        $sql = "INSERT INTO user (name, email, comments) values ('$name', '$contactEmail', '$comment')";

        $results = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == -1) {
            echo "Your CV has been sent but You have already give us Your's contact.";
        } else {
            echo "ok";
        }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
