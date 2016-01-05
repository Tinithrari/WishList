<?php
    session_start();

    include_once "../application/config.php";
    include_once CONTROLER_PATH . "UtilisateurControler.class.php";

    if (! isset($_POST["username"]) || ! isset($_POST["password"]))
    {
        echo "Erreur: Les champs nécessaires n'ont pas été initialisés";
        exit(1);
    }

    $controler = new \controler\UtilisateurControler();

    $usr = $controler->trouverUtilisateurParPseudo($_POST["username"]);

    if ($usr != null && $usr->mdp == sha1($_POST["password"]))
    {
        $_SESSION["id"] = $usr->id;
        $_SESSION["username"] = $usr->pseudo;
        $_SESSION["password"] = $usr->mdp;

        header("location: ../profile.php?id=$usr->id");
    }
    else
        header("location: ../index.php?auth=fail");
?>