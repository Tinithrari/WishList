<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 06/01/2016
 * Time: 19:49
 */

session_start();

include_once "application/config.php";
include_once "application/controler/UtilisateurControler.class.php";

if (! isset ($_SESSION["id"]))
    header("location: index.php");

if (! isset($_GET["target_id"]))
{
    echo "<p> Un des champs est manquants </p>";
    exit(1);
}

$ctrl = new \controler\UtilisateurControler();

try {
    $ctrl->supprimerFollowingById($_SESSION["id"], $_GET["target_id"]);
}
catch (PDOException $e){}
header("location: profile.php?id=" . $_GET["target_id"]);

?>