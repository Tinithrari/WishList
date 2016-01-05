<?php
/**
 * Created by PhpStorm.
 * User: agathe
 * Date: 05/01/16
 * Time: 15:03
 */

    include_once (CONTROLER_PATH . "UtilisateurControleur.class.php");

    session_start();
    if !isset($_SESSION["username"]) or !issset($_SESSION["id"]) or !isset($_SESSION["password"]){
        header("Location : ../index.php");

?>