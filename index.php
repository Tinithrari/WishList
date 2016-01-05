<?php
    //TODO Vérifier l'existance d'une session ou d'un cookie
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/index.css">
</head>
<body>
    <header>
        <a href="#"><img alt="Logo de starwish" src="resource/img/Logo.png" id="logo"></a>

        <form name="login" method="post" class="form-inline">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </header>
    <div class="subscribe">
        <form name="signup" method="post" class="signup">
            <h2>Inscription:</h2>

            <div class="row">
                <div class="form-inline">
                    <div class="col-lg-5"><input type="text" name="prenom" class="form-control input-lg" placeholder="Prénom"></div>
                    <div class="col-lg-5 col-lg-push-1"><input type="text" name="nom" class="form-control input-lg" placeholder="Nom"></div>
                </div>
            </div>
            <br/>
            <br/>
            <input type="text" name="username" class="form-control input-lg" placeholder="Pseudonyme">
            <br/>
            <br/>
            <input type="password" name="password" class="form-control input-lg" placeholder="Mot de passe">
            <br/>
            <br/>
            <input type="password" name="confirmPassword" class="form-control input-lg" placeholder="Confirmer le mot de passe">
            <br/>
            <br/>
            <input type="email" name="mail" class="form-control input-lg" placeholder="E-Mail">
            <br/>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
</body>
</html>