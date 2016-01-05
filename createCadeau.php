<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 05/01/2016
 * Time: 19:15
 */

session_start();

include_once "application/config.php";
include_once "service/check_auth.php";
include "header.html";
include_once MODEL_PATH . "liste.class.php";
include_once CONTROLER_PATH . "ListControler.class.php";

if (! isset($_GET["nom"]) || ! isset($_GET["date"]) || ! isset($_GET["idEvenement"]) || !isset($_SESSION["id"]))
{
    echo "<p>Erreur: Un des champs obligatoire n'est pas défini</p>";
    exit(1);
}

$liste = new \model\liste();

$liste->nom = $_GET["nom"];
$liste->dateEvenement = $_GET["date"];
$liste->evenement_id = $_GET["idEvenement"];
$liste->commentaire = ! isset ($_GET["commentaire"]) ? $_GET["commentaire"] : "NULL";

$liste->utilisateur_id = $_SESSION["id"];

$ctrl = new \controler\ListControler();

$ctrl->creerListe($liste);

echo "<div class='jumbotron'><p> Liste créé avec succès </p><a href='profile.php'><p>Retour au profil</p></a></div>";

?>
</body>
</html>