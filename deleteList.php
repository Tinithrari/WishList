<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 07/01/2016
 * Time: 11:32
 */

session_start();

include_once "application/config.php";
include_once CONTROLER_PATH . "ListControler.class.php";

if (! isset ($_SESSION["id"]))
    header("location: index.php");

if (! isset($_GET["id"]))
{
    echo "<p>Erreur: Un des paramètres est manquant</p>";
    exit(1);
}

$ctrl = new \controler\ListControler();

try {
    $list = $ctrl->getListeById($_GET["id"]);

    if ($list->utilisateur_id != $_SESSION["id"])
        header("location: lists.php?type=liste");

    $ctrl->supprimerListe($list);
}
catch (PDOException $e){}

header("location: lists.php?type=liste");

?>