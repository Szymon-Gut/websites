<?php
session_start();

include "dbConnector.php";
global $conn;

$id = $_SESSION['uid'];

$sql = "SELECT * FROM users WHERE id='$id'";

$results = mysqli_query($conn, $sql);

$sql2 = "SELECT USER, nationality FROM (SELECT * FROM userToCountries  WHERE user='$id') as u JOIN countries c on u.country=c.num_code";

$sql3 = "SELECT en_short_name FROM (SELECT * FROM users  WHERE id='$id') as u JOIN countries c on u.country=c.num_code";

$results2 = mysqli_query($conn, $sql2);

$results3 = mysqli_query($conn, $sql3);

if (mysqli_num_rows($results) == 1) {
    $info = mysqli_fetch_array($results);
    $email= $info['email'];
    $login = $info['login'];
    $birth = $info['birth'];
    $hobby = $info['hobby'];
}

if (mysqli_num_rows($results2) > 0) {
    $languages = [];
    while ($array = mysqli_fetch_array($results2)) {
        $languages[] = $array['nationality'];
    }
} else {
    $languages=null;
}

if (mysqli_num_rows($results3) == 1) {
    $info = mysqli_fetch_array($results3);
    $country = $info['en_short_name'];
} else {
    $country = null;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles-profile.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/690158f6f5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body class="h-100 bg-light">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Flashcards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="profile.php">Profile</a>
                </li>
            </ul>
            <a class="btn btn-warning">Logout</a>
        </div>
    </nav>
    <div id="main" class="container h-100">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-5 col-xl-5 col-xs-12">
                <div id="avatar" class="container w-75 tables">
                    <h2 class="blue-form">My avatar</h2>
                    <?php
                    $target_file = "avatars/".$_SESSION["uid"].".jpg";
                    If(file_exists($target_file)) {
                        echo "<img class='img-fluid img-thumbnail' src='$target_file' alt='something went wrong with displaying Your avatar'>";
                    } else {
                        echo "<img class='img-fluid img-thumbnail' src='avatars/avatar.jpg' alt='something went wrong with displaying Your avatar'>";
                    }
                    ?>
                    <form class="blue-form" enctype="multipart/form-data" method="post" action="profile-configure.php"> <!--to do!!!!!!!-->
                        <div class="form-group">
                            <label class="blue-form" for="fileToUpload">Upload new avatar</label>
                            <input type="file" id="fileToUpload" name="upload" class="form-control form-control-sm w-75 blue-form" onchange="this.form.submit()">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8  col-sm-12 col-lg-7 col-xl-7 col-xs-12">
                <div id="info" class="container w-75 tables">
                    <h2>Personal informations</h2>
                    <form class="">
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label blue-form">Email</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext blue-form" id="email" value="<?php echo $email?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nick" class="col-sm-4 col-form-label blue-form">User name</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext blue-form" id="nick" value="<?php echo $login?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="country" class="col-sm-4 col-form-label blue-form">Country</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext blue-form" id="country" value="<?php
                                if (is_null($country)) {
                                    echo "-";
                                } else {
                                    echo $country;
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="birth" class="col-sm-4 col-form-label blue-form">Birth</label>
                            <div class="col-sm-6">
                                <input type="date" readonly class="form-control-plaintext blue-form" id="birth" value="<?php echo $birth?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="languages" class="col-sm-4 col-form-label blue-form">Languages</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext blue-form" id="languages" value="<?php
                                if (!is_null($languages)) {
                                    for( $i=0; $i < count($languages); $i++) {
                                        if($i == count($languages)-1) {
                                            echo $languages[$i];
                                        } else {
                                            echo $languages[$i].", ";
                                        }
                                    }
                                } else {
                                    echo "-";
                                }

                                ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="hobby" class="col-sm-4 col-form-label blue-form">Hobby</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext blue-form" id="hobby" value="<?php
                                if (is_null($hobby)) {
                                    echo "-";
                                } else {
                                    echo $hobby;
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit personal informations TODO</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="edit-profile.php" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="country-edit"><strong>Country</strong></label>
                            <input class="form-control" type="text" name="country-edit" placeholder="..." id="country-edit">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="birth-edit"><strong>Birth</strong></label>
                            <input class="form-control" type="date" name="birth-edit" placeholder="..." id="birth-edit">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="language-edit"><strong>Languages</strong></label>
                            <input class="form-control" type="text" name="language-edit" placeholder="..." id="language-edit">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="hobby-edit"><strong>Hobby</strong></label>
                            <input class="form-control" type="text" name="hobby-edit" placeholder="..." id="hobby-edit">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
