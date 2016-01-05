<?php

    session_start();

    include_once ("application/config.php");
    include("header.html");
    include_once CONTROLER_PATH . "UtilisateurControler.class.php";
    include_once CONTROLER_PATH . "ListControler.class.php";

?>
    <div class="suggest">
        <h3>Amis aléatoire :</h3>
        <div class="profil-thumbnail">
            <img src="resource/img/DefaultAvatar.png" class="profil-icon">
            <h4>Jean Tusaispas</h4>
        </div>

        <div class="profil-thumbnail">
            <img src="resource/img/DefaultAvatar.png" class="profil-icon">
            <h4>Gérard menvusa</h4>
        </div>
    </div>

    <div class="profil">
        <div class="profil-header">

            <?php
                if (! isset($_GET["id"])) {
                    $_GET["id"] = $_SESSION["id"];
                }
                $ctrl = new \controler\UtilisateurControler();

                $usr = $ctrl->trouverUtilisateurParId($_GET["id"]);

                if ($usr == null)
                {
                    echo "<p> L'utilisateur demandé n'existe pas</p>";
                    exit(1);
                }

                echo '<img src="' . ($usr->chemin_photo == "NULL" ? "resource/img/DefaultAvatar.png" : $usr->chemin_photo) . '" class="profil-img img-circle">';
            ?>
            <div class="info">
                <?php
                    echo "<h2>$usr->prenom $usr->nom ($usr->pseudo)</h2>";

                    $listCtrl = new \controler\ListControler();

                    $liste = $listCtrl->trouverListes($usr->id);

                    $followers = $ctrl->trouverFollowers($usr->id);

                    echo "<h4><a>" . count($liste) . " listes </a> | <a>" . count($followers) . " followers </a></h4>";
                ?>
            </div>
        </div>

        <div class="event">
            <img src="resource/img/DefaultAvatar.png" class="event-img">
            <h4>Ajout de cadeau</h4>
            <p>Prénom nom a ajouté le cadeau dans la liste : <a>Lorem ipsum</a></p>
        </div>

        <div class="event">
            <img src="resource/img/DefaultAvatar.png" class="event-img">
            <h4>Création de liste</h4>
            <p>Prénom nom a créer une liste</p>
        </div>
    </div>
</body>
</html>
