<?php

    include_once (CONTROLER_PATH . "UtilisateurControleur.class.php");

    if (! isset($_POST["username"]) || ! isset($_POST["password"]))
    {
        echo "Erreur: Les champs nécessaires n'ont pas été initialisés";
        exit(1);
    }


?>