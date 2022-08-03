<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles-index-php.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/690158f6f5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Flashcards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
            </ul>
            <a class="btn btn-warning">Logout</a>
        </div>
    </nav>
    <div class="container-fluid">
        <?php
            include 'dbConnector.php';
            global $conn;

            $id = $_SESSION['uid'];

            $sql = "SELECT * FROM zestaw WHERE user_id='$id'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $flashcards = [];
                $description = [];
                while ($array = mysqli_fetch_array($result)) {
                    $flashcards[] = $array['name'];
                    $description[] = $array['description'];
                }
                $counter = 0;
                foreach($flashcards as $name) {
                    $counter++;
                    if ($counter%3==1) {
                        echo '<div class="row">';
                    }
                    echo   '<div class="col-sm-12, col-md-6, col-lg-4">
                                <div  class="card bg-primary flashcard">
                                    <img class="card-img-top" src="https://www.wikihow.com/images/thumb/e/ef/Make-Flash-Cards-Step-2-Version-9.jpg/v4-460px-Make-Flash-Cards-Step-2-Version-9.jpg.webp">
                                    <div class="card-body"> <h4 class="card-title words-header">'.
                                            $name.
                                        '</h4>
                                         <p class="card-text">'.
                                            $description[$counter-1].
                                         '</p>
                                         <a href="study.php?param='. $name.'"class="btn btn-warning">Learn</a>
                                         <button type="button" class="open-homeEvents btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal2" data-id="'.$name.'">Add new</button>
                                    </div>    
                                </div>
                           </div>';
                    if ($counter%3==0){
                        echo '</div class="row">';
                    }
                }
                $counter++;
                if ($counter%3==1) {
                    echo '<div class="row">';
                }
                echo   '<div class="col-sm-12, col-md-6, col-lg-4">
                            <div  class="card bg-primary flashcard">
                                <img class="card-img-top" src="https://www.wikihow.com/images/thumb/e/ef/Make-Flash-Cards-Step-2-Version-9.jpg/v4-460px-Make-Flash-Cards-Step-2-Version-9.jpg.webp">
                                <div class="card-body"> 
                                    <h4 class="card-title words-header">
                                        Add new set
                                    </h4>
                                     <p class="card-text">
                                        If u want to add new set of words click here
                                     </p>
                                     <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">Add new</button> 
                                </div>    
                            </div>
                       </div>';
                if ($counter%3==0){
                    echo '</div class="row">';
                }


            } else {
                echo '<div id="flashcard" class="row bg-primary">You dont have any sets </div>';
            }
        ?>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create new word set</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="new_set_upload.php" method="post">
                    <!-- Modal body -->
                        <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label" for="name"><strong>Name</strong></label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter there new word set name..." id="name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="description"><strong>Description</strong></label>
                                    <input class="form-control" type="text" name="description" placeholder="Enter there new word set description..." id="description">
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
        <div class="modal fade" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add new word to this set</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="new_word_upload.php" method="post">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="word-modal"><strong>Word</strong></label>
                                <input class="form-control" type="text" name="word" placeholder="Enter there new word..." id="word-modal">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="translation-modal"><strong>Translation</strong></label>
                                <input class="form-control" type="text" name="translation" placeholder="Enter there translation..." id="translation-modal">
                                <input type="hidden" name="set" id="eventId">
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

    </div>
    <script>
        $(document).on("click", ".open-homeEvents", function () {
            var eventId = $(this).data('id');
            $('#eventId').val( eventId );
        });
    </script>
</body>
</html>