<?php
    session_start();

    include_once (CONTROLER_PATH . "UtilisateurControler.class.php");

    if (! isset($_POST["username"]) || ! isset($_POST["password"]))
    {
        echo "Erreur: Les champs nécessaires n'ont pas été initialisés";
        exit(1);
    }

    $controler = new \controler\UtilisateurControler();

    $usr = $controler->trouverUtilisateurParPseudo($_POST["username"]);

    if ($usr != null && sha1($usr->mdp) == $_POST["password"])
    {
        $_SESSION["id"] = $usr->id;
        $_SESSION["username"] = $usr->pseudo;
        $_SESSION["password"] = $usr->mdp;

        header("../profile.php?id=$usr->id");
    }
    else
        header("../index.php?auth=fail");
?>