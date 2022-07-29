<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/690158f6f5.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/map.css">
</head>
<body>
<div class="header">
    <h1>Personal Website</h1>
</div>
<div class="navbar">
    <a href="index.php"><i class="fa-solid fa-house"></i> Home </a>
    <a href="interests.php"><i class="fa-solid fa-book"></i> Interests</a>
    <a href="project.php"><i class="fa-solid fa-keyboard"></i> Projects</a>
    <a id="active" href="map.php"><i class="fa-solid fa-map-location"></i> Map</a>
</div>
<div class="row">
    <section class="text-map">
        <h2><span id="header">Where was my first Intern?</span></h2>
        As it was mentioned on the main page, my simple website was created during first week of my intern for Nord Inwest sp. z.o.o.
        If You are interested in web developing more than me, and You are from Olsztyn neighbourhood You can easily join IT team there
        and help with working on DBK group projects. It's quite new department, so they still need new people to work so there are high chances
        that after the intern you can sign a contract as Junior PHP Developer. All is up to You. I started learning there and i know that
        there are still a lot of thing I should learn according to Web Developing but as I said, I am most interested in Data Science.
        Web Development is interesting but short episode of mine but every experience I found useful, and I am glad that I got basics
        of HTML, CSS, JavaScript, JQuery etc. I am sure that someday I will need these technologies for some part of my project and thanks
        to my basic knowledge It will be for sure much quicker than if I had to learn it from scratch.
    </section>
    <div class="wrapper">
        <div class="circle"></div>
            <img src="loupe.png" alt="Pepsi Can">
            <div class="content">
                <h2>Nord Inwest sp. z.o.o</h2>
                <p><br>Nie masz pomysłu na staż? Śmiało spróbuj tutaj.</p>
                <button onclick="map()">Sprawdź</button>
                <script>
                    function map() {
                        document.getElementsByClassName("wrapper")[0].style.display="none"
                        document.getElementsByClassName("map")[0].style.display="block"
                    }
                </script>
            </div>

    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2357.109913852401!2d20.531497958685204!3d53.787531255319685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e2796af5faa013%3A0xade59b6850cdb9d1!2sLubelska%2043A%2C%2010-410%20Olsztyn!5e0!3m2!1spl!2spl!4v1657717652167!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<div class="footer">
    Copyright
</div>
</body>
</html>