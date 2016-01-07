<?php

session_start();

include_once "application/config.php";
include_once "check_auth.php";

include_once "header.html";

include_once MODEL_PATH . "utilisateurSQL.class.php";
include_once MODEL_PATH . "utilisateur.class.php";

if (! isset($_GET["search"]) || $_GET["search"] == "")
{
    echo "<p>Ne peut rechercher un champs vide</p>";
    exit(1);
}

$ctrl = new \model\utilisateurSQL();

$userList = $ctrl->prepareFindWith("nom LIKE '" . $_GET["search"] . "%' OR prenom LIKE '" . $_GET["search"] . "%' OR pseudo LIKE '". $_GET["search"] ."%'", array())->execute();

echo "<div class='list-container'>";

foreach ($userList as $user)
{
    echo "<div class='profil-thumbnail'>
            <img src='" . ($user->chemin_photo == "NULL" ?  "resource/img/DefaultAvatar.png" : $user->chemin_photo ). "' class=\"profil-icon\">
            <h4><a href='profile.php?id=$user->id'>$user->prenom $user->nom ($user->pseudo)</a></h4>
         </div>";
}

echo "</div>";

?>