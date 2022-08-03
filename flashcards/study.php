<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles-study.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/690158f6f5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body class="h-100">
    <script>
        google.charts.load('current', {'packages':['corechart']});

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Contry', 'Mhl'],
                ['Correct',counter],
                ['Incorrect', setLength-counter]
            ]);

            var options = {
                title:'Statistics',
                fontSize: 18,
                height: 500,
                width: 500,
                chartArea:{width:"100%",height:"90%"}
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>
    <?php
    include 'dbConnector.php';
    global $conn;


    $name =  $_GET['param'];

    $sql = "SELECT word, meaning FROM word as w JOIN  word_set as ws on ws.word_id=w.id JOIN zestaw AS z ON z.id=ws.set_id WHERE z.name='$name'";

    $results = mysqli_query($conn, $sql);

    $words = [];
    while ($array = mysqli_fetch_array($results)) {
        $words[$array['word']] = $array['meaning'];
    }
    $randomWords = json_encode($words);
    ?>
    <script>
        var randomWords = <?php echo $randomWords?>;
        var setLength = Object.keys(randomWords).length;
        var counter = 0;
        function randomKey(obj) {
            var keys = Object.keys(obj);
            return keys[ keys.length * Math.random() << 0];
        };
        function changeContent(){
            document.myForm.translation.classList.remove("invalid")
            let x = document.myForm.translation.value;
            var actWord = document.myForm.word.value;
            console.log(randomWords)
            console.log(actWord)
            console.log(randomWords[actWord])
            if (randomWords[actWord]==x) {
                counter++;
                document.myForm.translation.value='';
                var percentage = Math.round((counter/setLength) *100)
                document.getElementById("progress-bar").innerHTML=percentage.toString();
                document.getElementById("progress-bar").style.width = percentage.toString() + "%"
                // document.getElementsByClassName("progress-bar").style.width = counter / Object.keys(randomWords).length * 100
                delete randomWords[actWord];
            } else {
                document.myForm.translation.classList.add("error")
                return counter;
            }
            if (Object.keys(randomWords).length > 0) {
                document.myForm.word.value = randomKey(randomWords);
            } else {
                document.myForm.style.display = "none";
                document.getElementById("finished").style.display = "flex";
                drawChart();
            }
            return  counter;
        }
        function loadContent() {
            var word = randomKey(randomWords);
            if (Object.keys(randomWords).length > 0) {
                document.myForm.word.value = word;
                document.myForm.style.display = "block";
            } else {
                document.getElementById("finished").style.display = "none";
                document.getElementById("no-words").style.display
            }
            document.getElementById("starting").style.display = "none"
        }
    </script>

    <div class="container-fluid">
        <div class="row" style="height:5vh;">
            <div class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Flashcards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="study.php">Learning</a>
                    </li>
                </ul>
                <a class="btn btn-warning">Logout</a>
            </div>
            </div>
        </div>
        <div class="row" style="height:95vh;">
            <div class="col-sm-4 h-100" style="height: 100%">
                <div id="starting" class="card" style="width: 18rem;">
                    <img src="https://www.wikihow.com/images/thumb/e/ef/Make-Flash-Cards-Step-2-Version-9.jpg/v4-460px-Make-Flash-Cards-Step-2-Version-9.jpg.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        <p class="card-text">You have choosen <?php echo $name;?> word table. If u want to learn from
                            different set just return to main page and select something else.
                        </p>
                        <button class="btn btn-primary" onclick="loadContent()">Learn</button>
                    </div>
                </div>
                <form name="myForm" method="post" id="login-form" style="display: none">
                    <div class="progress">
                        <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  style="width: 4%">0%</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="word"><strong>Word to translate</strong></label>
                        <input class="form-control-plaintext" name="word" type="text" id="word" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="translation"><strong>Translation</strong></label>
                        <input  class="form-control" type="text" name="translation" placeholder="here pass the translation..."
                                id="translation" onchange="
                                function removeError() {
                                    document.myForm.translation.classList.remove('error')
                                }
                                removeError()">
                    </div>
                    <div class="mb-3">
                        <button id="myBtn" type="button" class="btn btn-primary" onclick="counter=changeContent()">confirm</button>
                    </div>
                </form>
                <div id="finished" class="row" style="display: none;">
                    <h4 id="chart-header">Your score</h4>
                    <div id="myChart" style="width:100%; max-width:500px; height:500px;">
                    </div>
                </div>
            </div>
            <div class="col-sm-8 h-100">
                <img  src="study.jpg"  alt="">
            </div>
        </div>
    </div>
    <script>
        $("#translation").on("keyup",function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("myBtn").click();
            }
        })
    </script>
</body>
</html>
