<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles-login.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/690158f6f5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row vh-100 vw-100" style="height:100%;">
        <div class="col-sm-4 vh-100">
            <div class="my-3">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="register.php">Register</a>
                    </li>
            </div>
            <form class="mt-5" action="register-authorization.php" method="post" id="register-form">
                <div class="mb-3">
                    <label for="startDate">Birth date</label>
                    <input id="startDate" class="form-control" type="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="User Name or email" id="email" required><br>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="login">User Name</label>
                    <input class="form-control" type="text" name="uname" placeholder="User Name or email" id="login" required><br>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="pwd">Password</label>
                    <input  class="form-control" type="password" name="password" placeholder="Password" id="pwd" required><br>
                </div>
                <div class="mb-4">
                    <p class="text-black-50">
                        Klikając Zarejestruj się, akceptujesz <a class="text-decoration-none" href="https://quizlet.com/pl/tos">Warunki korzystania </a> z Usługi Quizlet oraz <a class="text-decoration-none" href="https://quizlet.com/privacy">Politykę prywatności</a>
                    </p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
<!--                <div class="mb-3">-->
<!--                    <div id="row-alert-danger" class="form-group" style="display: none;">-->
<!--                        <div id="alert-div-danger" class="alert alert-danger" role="alert"></div>-->
<!--                    </div>-->
<!--                    <div id="row-alert-success" class="form-group" style="display: none; margin-top: 15px">-->
<!--                        <div id="alert-div-success" class="alert alert-success" role="alert"></div>-->
<!--                    </div>-->
<!--                </div>-->
            </form>
        </div>
        <div class="col-sm-8 vh-100">
            <img src="https://content.thriveglobal.com/wp-content/uploads/2021/02/file-20171219-27562-ihj0n0.jpg?w=1550"  alt=""/>
        </div>
    </div>
</div>
</body>
