<?php
    //TODO Check cookie, session, and GET
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="resource/css/style.css">
    <link rel="stylesheet" href="resource/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <header>
        <a href="#"><img alt="Logo de starwish" src="resource/img/WhiteLogo.png" id="logo"></a>

        <form name="search" method="post" class="form-inline">
            <div class="form-group">
                <input type="text" name="search" class="form-control input-lg">
                <button type="submit" class="btn btn-primary btn-lg">Rechercher</button>
            </div>
        </form>

        <ul class="nav-button-bar">
            <li><input type="image" class="nav-button" id="following" src="resource/img/People.png"></li>
            <li><input type="image" class="nav-button" id="confidentialite" src="resource/img/Gears.png"></li>
            <li>
                <input type="image" class="nav-button" id="notification" src="resource/img/WhiteStar.png">
                <!-- Ici la liste des notifications -->
            </li>
        </ul>
    </header>
    <div class="profil">
        <div class="profil-header">

        </div>
    </div>
    <div class="suggest">

    </div>
</body>
</html>
