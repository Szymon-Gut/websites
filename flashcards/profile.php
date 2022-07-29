<?php
session_start();

$sname = "127.0.0.1";

$unmae = "root";

$password = 123456;

$db_name = "flashcards";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

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
            <a class="navbar-brand" href="index.php">Flashcards</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Flashcards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container h-100">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-5 col-xl-5 col-xs-12">
                <div id="avatar" class="container w-75 tables">
                    <h2>My avatar</h2>
                    <?php
                    $target_file = "avatars/".$_SESSION["uid"]."jpg";
                    If(file_exists($target_file)) {
                        echo "<img class='img-fluid img-thumbnail' src='$target_file' alt='something went wrong with displaying Your avatar'>";
                    } else {
                        echo "<img class='img-fluid img-thumbnail' src='avatars/avatar.jpg' alt='something went wrong with displaying Your avatar'>";
                    }
                    ?>
                    <form enctype="multipart/form-data" method="post" action="profile-configure.php"> <!--to do!!!!!!!-->
                        <div class="form-group">
                            <label for="fileToUpload">Upload new avatar</label>
                            <input type="file" id="fileToUpload" name="upload" class="form-control form-control-sm w-75">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8  col-sm-12 col-lg-7 col-xl-7 col-xs-12">
                <div id="info" class="container w-75 tables">
                    <h2>Personal informations</h2>
                    <form>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $email?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nick" class="col-sm-4 col-form-label">User name</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="nick" value="<?php echo $login?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="country" class="col-sm-4 col-form-label">Country</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="country" value="<?php
                                if (is_null($country)) {
                                    echo "-";
                                } else {
                                    echo $country;
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="birth" class="col-sm-4 col-form-label">Birth</label>
                            <div class="col-sm-6">
                                <input type="date" readonly class="form-control-plaintext" id="birth" value="<?php echo $birth?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="languages" class="col-sm-4 col-form-label">Languages</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="languages" value="<?php
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
                            <label for="hobby" class="col-sm-4 col-form-label">Hobby</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="hobby" value="<?php
                                if (is_null($hobby)) {
                                    echo "-";
                                } else {
                                    echo $hobby;
                                }
                                ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
