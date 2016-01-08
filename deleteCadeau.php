<?php

session_start();

include_once "application/config.php";
include_once CONTROLER_PATH . "CadeauControler.class.php";

if (! isset ($_SESSION["id"]))
    header("location: index.php");

if (! isset($_GET["id"]))
{
    echo "<p>Erreur: Un des paramètres est manquant</p>";
    exit(1);
}

$ctrl = new \controler\CadeauControler();

try {
    $list = $ctrl->getCadeauById($_GET["id"]);

    if ($list->utilisateur_id != $_SESSION["id"])
        header("location: lists.php?type=cadeau&liste_id=" . $list->liste_id);

    $ctrl->supprimerCadeau($list);
}
catch (PDOException $e){}

header("location: lists.php?type=cadeau&liste_id=" . $list->liste_id);

?>