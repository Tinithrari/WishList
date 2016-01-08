<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 07/01/2016
 * Time: 13:38
 */

session_start();

include_once "application/config.php";
include_once MODEL_PATH . "message.class.php";
include_once CONTROLER_PATH . "MessageControler.class.php";

if (! isset ($_SESSION["id"]))
    header("location: index.php");

if (! isset($_GET["liste_id"]) || ! isset($_GET["texte"]))
{
    echo "Erreur: paramètre invalide";
    exit(1);
}

$mess = new \model\message();

$mess->texte = $_GET["texte"];
$mess->liste_id = $_GET["liste_id"];
$mess->utilisateur_id = $_SESSION["id"];

$ctr = new \controler\MessageControler();

try {
    $ctr->createMessage($mess);
}
catch (PDOException $e) {}

header("location: lists.php?type=cadeau&liste_id=" . $_GET["liste_id"]);

?>