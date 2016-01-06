<?php

ob_start();

include_once "application/config.php";
include_once CONTROLER_PATH . "UtilisateurControler.class.php";
include_once MODEL_PATH . "utilisateur.class.php";
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 05/01/2016
 * Time: 12:02
 */

if (! isset($_POST["prenom"]) || ! isset($_POST["nom"]) || ! isset($_POST["username"]) || ! isset($_POST["password"])
    || ! isset($_POST["mail"]) || ! isset($_POST["naissance"])) {
    echo "Erreur: Un des champs pour l'inscription est manquant";
    exit(1);
}

$user = new \model\utilisateur();

$user->prenom = $_POST["prenom"];
$user->nom = $_POST["nom"];
$user->pseudo = $_POST["username"];
$user->mdp = sha1($_POST["password"]);
$user->mail = $_POST["mail"];
$user->ville = $_POST["ville"] == null ? "NULL" : $_POST["ville"];
$user->naissance = $_POST["naissance"];
$user->chemin_photo = "NULL";

$control = new \model\utilisateurSQL();

$control = new \controler\UtilisateurControler();

$control->creerUtilisateur($user);

$message =  "
<html>
<body>
<h1> Welcome $user->prenom $user->nom</h1>
<p> Here are your your personnal informations:</p>
<br>
<p>Username: $user->pseudo</p>
<p>Password: $user->mdp</p>
</body>
</html>";


mail($user->mail, "Welcome to StarWish",
    "<h1> Welcome $user->prenom $user->nom</h1> <p> Here are your your personnal informations:</p><br> <p>Username: $user->pseudo</p><p>Password:" . $_POST["password"] . "</p>",
    null, "FROM: noreply@starwish.com");

header("location: index.php");
?>