<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 05/01/2016
 * Time: 19:15
 */

session_start();

if (! isset ($_SESSION["id"]))
    header("location: index.php");

include_once "application/config.php";
include "header.html";
include_once MODEL_PATH . "cadeau.class.php";
include_once CONTROLER_PATH . "CadeauControler.class.php";

if (! isset($_GET["nom"]) || ! isset($_GET["liste_id"]) || !isset($_GET["typeCadeau"]))
{
    echo "<p>Erreur: Un des champs obligatoire n'est pas défini</p>";
    exit(1);
}

$cadeau = new \model\cadeau();

$cadeau->nom = $_GET["nom"];
$cadeau->type_cadeau_id = $_GET["typeCadeau"];
$cadeau->lien =  isset ($_GET["lien"]) ? $_GET["lien"] : "NULL";
$cadeau->description = isset ($_GET["description"]) ? $_GET["description"] : "NULL";
$cadeau->liste_id = $_GET["liste_id"];

$ctrl = new \controler\CadeauControler();

$ctrl->creerCadeau($cadeau);

echo "<div class='jumbotron'><p> Cadeau créé avec succès </p><a href='profile.php'><p>Retour au profil</p></a></div>";

?>
</body>
</html>