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

if (! isset($_GET["id"]))
{
    echo "Erreur: paramètre invalide";
    exit(1);
}

$ctr = new \controler\MessageControler();


try {
    $mess = $ctr->getMessageById($_GET["id"]);

    if ($mess->utilisateur_id != $_SESSION["id"])
        header("location: lists.php?type=cadeau&liste_id=" . $mess->liste_id);

    $ctr->deleteMessage($mess);
}
catch (PDOException $e) {}

header("location: lists.php?type=cadeau&liste_id=" . $mess->liste_id);

?>