<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/690158f6f5.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/project.css">
</head>
<body>
<div class="header">
    <h1>Personal Website</h1>
</div>
<div class="navbar">
    <a href="index.php"><i class="fa-solid fa-house"></i> Home </a>
    <a href="interests.php"><i class="fa-solid fa-book"></i> Interests</a>
    <a id="active" href="project.php"><i class="fa-solid fa-keyboard"></i> Projects</a>
    <a href="map.php"><i class="fa-solid fa-map-location"></i> Map</a>
</div>
<div class="row">
    <div id="fb" class="text">
        <h2><span class="section">Facebook Dashboard</span></h2>
        Below Facebook Dashboard is presented. It is a dashboard created using streamlit Python library. If files are uploaded we can see many statistics which are not allowed
        in normal Facebook interface. Project was created for Data Visualization classes. We can check there in which hours we are active the most, or check with who whe have
        most messages. It is not host anymore but You can check it running it locally or You can check our demo video on YouTube. <br> Video and direct link to the project avaible below. <br>
        <div class="links">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/iwB44FcTwOs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <a href="https://github.com/Szymon-Gut/Facebook-Dashboard"><img id="logo" src="data:image/png;base64,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" alt="github"></a>
    </div>
    <div id="ghg" class="text">
        <h2><span class="section">Greenhouse gases emmision</span></h2>
        This is a poster totally done in R. It is also done for Technique of Data Visualization classes. We have chosen this topic because of huge pollution
        of the environment and continuous growth of GHG emission per capita. This is informative poster when You can check some statistics illustrated on charts.
        To be honest there are some interesting facts I didn't know before. Below direct link to project where is also compiled pdf so You don't need to run the code to see
        final poster. <br>
        <div class="links">
            <a href="https://github.com/MI2-Education/2022Z-DataVisualizationTechniques/tree/main/projects/project1/Bielecki_Ga%C5%82kowski_Gut"><img id="logo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAgVBMVEUAAAD////39/cEBAT8/Pzr6+uTk5N3d3e9vb3T09M1NTXAwMDZ2dnW1tbg4OCQkJCioqLx8fG0tLQ7OzsrKyuEhIRpaWlbW1skJCSZmZlDQ0MWFhbn5+esrKxjY2N9fX3KyspxcXFSUlJKSkoeHh4YGBivr68/Pz9oaGgnJycwMDAhvBfVAAAIB0lEQVR4nO2daXuqMBBGgeKCC6LWfUO79///wKvV3oogeScLmfhwPhfIqZBlMkk8/0gyfvIej6dxcpLzfD/u2C6LMTrxyTB8XMGjYng0HNguhVEGvhc+2y6EUZ5DL7BdBsMEtaHz1IbuUxu6T23oPrWh+9SG7lMbuk9t6D61ofvUhu5TG7pPbeg+taH71IbuUxu6T23oPhKG30k7GbQ+TJSmnPnhs7XbUbNG6Iarhv9DECUvxEsV6DTbw/D83BntSrph0/8j7G6JV0sxThpXD/VpF9MNYz9DIxkTb0Cl1cs+0Z+QLicbjv0c6Z52CxKDRu55EekGZMNF3tD3hzvaTWAGQcHTaPkxZMOoyPD4srZot4FoDYsfRvp/kg2Ln3kk1v2uTuN7j2pTbkM1nN01PDoeSLcqZ9m//6A15UZUw8LP8O+f+1p40Wo+nu2SUbubplEvXse9KO22R+/N/aEzXxVe8dwtfc7SoGH5k/2wmfnrt+V2MorWYckVQZxudrNsi7NKyp/iTw0a3vn2/1j/9gFeJqO18K///2cavaT1fblyILwsMWf4VFR73zoutq1Nv+x3u0eQLlq7DfCI1JzhUqLcBuiZM5zadjszNGfYsu12wZzhxLbahTdjhk3xwythbsywvMGvDkLf29Hf8FtcVEnDgW21C+Z+Qy41DSEcVbcWNzBp8SllJhq+2HY7Y7DXhvS8K6BrztDLR75sYHD05LVty/3wadCQRYMYEhp8suG3bbsTMaXE5Ggih6pmZNRQEIqqBNLEhZOGC6OGMhEm3Rj9Dje27X6gTJISDfe23c5Qwvo0ww6HmvQEoa6hGd6dDaqaEB8gkgxHtsX+wCfYKIZlM2uVA6dIUAzZvKMn4MqGYMglRnMBHUHhhisu9egvX7oNRbOWlZPqNrQtlAfr2cCGXKLdV2DdU9iQR4AmC9RioIZb2zZFpDoNU9s2hSCTbKDhN4dhYR6kTQQN97ZdikHqGtCQR5g0jz5DjjXpCSBLETMsSJvlATCIwgy5TN/nABJrMEOun6Hvi5cLYIa3ueR8EKcmY4a2Pe4jDg5DhivbHvdJ9Riy7JSeEbf5kCGLScNiAmHXFDJkODb8jzDlGzJk2xweEa4PgAx5TMcUIxwFQ4aMYt05hA0iZMhz+HtGuAuy84bCQTBkyLdbCmQtOP8d6jF8t61Rgp63lHNrIex6Q4bspiyuEM53O99rE0ZqIMOdbY0ShCtXIUNW09s36OmXPtvWKEG4G4DrUYxG8SrbBzLUNMa/twifAeL9FTBDvt028ewTZsgs0eQKXfFSJst/84TijVUwQ7YB04a47ODsGquEryu0zT2xHeUDJzmBhlxjwsBhXKAhkzVrtwCfIZxtwnOaW2MuBtMPEdk0DjXksjw2A5TYBue1cUwZgpJoYUOOrym0axNsyGSN8zXYamA8gxbeL6gysE3NcEN2k4hgwXFDdsEaMFmfsBqBW2wfXBhEMOzwajDQNfmUNTO8YhnopqIUQ1bj4A1aatLaNUbhmqB4/0JVQ0ZD/aa4sFKGbIaJyMBQypDNWJ+w1zZ1LTePDjhlywHyenwO3VPK9jR0QwZrSwgfoYyhd7CtOIQbCklDb29ZkLI5jZyh3cHwkHpkgdTpDzN7L2pAPpNB7nyLsa0atU8vq+QJHm922kW4u61uaCeoIbWzvfwpLIeqA/0prZVQN/S8pMoKpyG7bb/SSTrjyr7GUOYL1GB4HE5Vk4eSEPYN1mzoeUvjv2NA2SWRYrgctKNeFI32opDPzTk3egkj1aNB7hp+/j2kLwyff6ZmNj6Jm8A0tqxhJms2EA85P9u6a9Z0QDpPhmz4lf1VGsBM1rIZafoph/2EcoSFnGEubRbbyu+we+8pdVqDeLTTeZpLWV16O4KAYwer5X6TSmiG0Wj3otAuFFPWWsxvFjiTtiuktiNhS5gLK0d5e3jTvaaNXZa0qidV0ShB0OIv15lSUIJcK2orSdp3FUfUp3nKvmpAHtkv9P6cmaPNxL227JwafOShxCxOKDc8EgD0SzOK8AkvMu0/KdKLgvS8Mxvrglsyyi0G09oQXoDGFplWA5oz6EgJ+qmaTCGQ4VumGMihZ7Kr3Qych4mNDzNLu5CGf31PQcC7qk8ecAScqfrFDZf0UjDF4XgRoOFzZtAg7ITLb/qtv65BoxjZyV9RXEF+0K8WsSgCjtNkxwrloS+FBDHK6SMYsOHNDH7pt6iQlUI5Mw4Dj7XddFIaJbuHqoQYtX+ICtmXd99UpSkNbdGLX3DDt1wMplE00vhaqKUV0Y6kBiBEhAv6KeEo28F5bSpnTcmH79UN54WBtCDdtLbb7Ww2aUc65k21jy8oUf1KNo9IbRquqphNox2crtnQ2z+8YRWHzEjkIug0fDWfg2HZkBoDlUB7x5Q6Q2p8Vbd1Q+P7nNg39D5kIxTOGBre3IyFoTc1mLPPw9DzdsZeVS6GxxrH0LvKx/DINOnnhxthGChN5rMyPLGc7pqbUbvdHW0Wg0lreviYq62PYmdYxGttWIbtfinEm9jDcUOl77A2JGPC8Kk2dN5QaYu+2pBMbShFbei8oVJdajkijKHU4jthqNTzdsJw/vCGSnv1OGH4/fCGkomJDhkqnbTnhOGHiqETcRql+akGuMEVTOCFWtZPXaM2PQUetw0TeJQVBhhqh0XoXpNwNAzV1/hlUJwKp+1cIuZo6MdaFVd9JUF4NQBK8DPUScaavu/nrYYl7PHky3sCAA3/AVATiEblEyLhAAAAAElFTkSuQmCC" alt="github"></a>
        </div>
    </div>
    <div id="nobel" class="text">
        <h2><span class="section">Nobel's prizes dashboard</span></h2>
        Another dashboard created for Data Visualization lessons is connected with Nobel Prizes. We were supposed to create dashboard in R Shiny and few data visualizations.
        We found it really pleasant so we have decided to add some eye-catching features, and we tried to work a bit for appearance of our dashboard. Now when I am looking on this
        small project I see that there is so many things that can be improved but nevertheless I decided to put link to this project because I think R Shiny is not really
        common tool but it's really useful to host and present some data visualizations. Below there is a link to hosted dashboard and direct link to project on github. <br>
        <div class="links">
            <a href="https://github.com/MI2-Education/2022Z-DataVisualizationTechniques/blob/main/homeworks/hw6/Ga%C5%82kowskiMiko%C5%82aj_GutSzymon/app.R"><img id="logo" src="data:image/png;base64,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" alt="github"></a>
            <a href="https://galkowskim.shinyapps.io/hw6_TWD_Gut_Galkowski/"><img id="logo" src="https://play-lh.googleusercontent.com/3zdZsTwTKoxJ0MxRJ51a9hSscPTGzeU0TiN34zaJ2Cv2VYSEEe0sDXH6BS9PUyS_-4hW" alt="web"></a>
        </div>
    </div>
    <div id="wb-Montreal" class="text">
        <h2><span class="section">Predicting house pricing in Montreal</span></h2>
        <span class="wb">
        This is the machine learning project totally created in R. Our task was to create tree-based models to predict house pricing in Montreal. We have build around 30 tree models
        with different hyperparameters using grid search and random search methods. We have also tested our models on normal preprocessed data set and on preprocessed data set after using PCA() model.
        At the end we chose several best models and we did XAI (explainability of our models). What is important we did XAI on preprocessed data set without PCA(), because
        using PCA we are losing interpretation of our data (more about PCA there
        <a href="https://scikit-learn.org/stable/modules/generated/sklearn.decomposition.PCA.html">
            <img id="logo" src="https://scikit-learn.org/stable/_static/scikit-learn-logo-small.png" alt="sklearn">
        </a>). Below there is also a link to our science article about this topic. It is written in english and there is described full process of our work (since data processing
            through building models and ending on explainability of our results).</span>
        <span class="wb">Article available there: <a id="normal-link" href="https://github.com/MI2-Education/2022L-WB-ML-1/blob/main/milestones/articleFinal/WhyR/Article.pdf">Science article</a></span>

    </div>
    <div id="ml-phone" class="text">
        <h2><span class="section">Predicting actions based on mobile activity</span></h2>
        <span class="ml">This is a machine learning project about predicting actions based on smartphone activity. We have got data set containing several smartphone parameters eg.
        x,y,z coordinates etc. and based on It, we have created models to predict user actions like: sitting, walking, staying, going upstairs, going downstairs. Project was
        written in Python, using popular libraries like pandas, sklearn etc. Whole project is available on my GitHub:
            <a id="normal-link" href="https://github.com/MI2-Education/2022L-WB-ML-1/blob/main/milestones/articleFinal/WhyR/Article.pdf">TODO</a> </span>

    </div>
</div>
<div class="footer">
    Copyright
</div>
</body>
</html>