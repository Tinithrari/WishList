<?php
/**
 * Created by PhpStorm.
 * User: agathe
 * Date: 05/01/16
 * Time: 15:03
 */
    include_once (MODEL_PATH . "utilisateur.class.php");
    include_once (CONTROLER_PATH . "UtilisateurControleur.class.php");

    if (!isset($_SESSION["username"]) or !isset($_SESSION["id"]) or !isset($_SESSION["password"])) {
        $controller = new \controler\UtilisateurControler();
        $usr=$controller->trouverUtilisateurParId($_SESSION["id"]);
        if ($usr == NULL || $usr->pseudo != $_SESSION["username"] || $usr->mdp != $_SESSION['password'] )
            header("Location : ../index.php");
    }
?>