<?php
    //TODO Vérifier l'existance d'une session ou d'un cookie
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>StarWish - Connexion</title>
    <link rel="stylesheet" href="resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/index.css">
</head>
<body>
    <header>
        <a href="#"><img alt="Logo de starwish" src="resource/img/Logo.png" id="logo"></a>

        <form name="login" method="post" class="form-inline" action="service/auth.php">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </header>
    <div class="subscribe">
        <form name="signup" method="post" class="signup" action="subscribe.php">
            <h2>Inscription:</h2>

            <div class="row">
                <div class="form-inline">
                    <div class="col-lg-5"><input type="text" name="prenom" class="form-control" placeholder="Prénom" required></div>
                    <div class="col-lg-5 col-lg-push-1"><input type="text" name="nom" class="form-control" placeholder="Nom" required></div>
                </div>
            </div>
            <br/>
            <br/>
            <input type="text" name="username" class="form-control" placeholder="Pseudonyme" required>
            <br/>
            <br/>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
            <br/>
            <br/>
            <input type="password" name="confirmPassword" class="form-control" placeholder="Confirmer le mot de passe" required>
            <br/>
            <br/>
            <input type="email" name="mail" class="form-control" placeholder="E-Mail" required>
            <br/>
            <br/>
            <input type="text" name="ville" class="form-control" placeholder="Ville" required>
            <br/>
            <br/>
            <input type="date" name="naissance" class="form-control" required>
            <br/>
            <br>
            <input type="submit" class="btn btn-primary" value="S'inscrire">
        </form>
    </div>
</body>
</html>