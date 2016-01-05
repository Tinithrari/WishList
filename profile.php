<?php

    session_start();

    include_once ("application/config.php");
    include("header.html");

    include_once CONTROLER_PATH . "EvenementControler.class.php";
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

        <?php
        $usr_id = $_SESSION["id"];

        $listCtrl = new \controler\ListControler();

        $liste = $listCtrl->trouverListes($usr_id);

        if (!count($liste))
            echo "<p> Aucune liste à afficher </p>";
        else {
            $evtCtrl = new \controler\EvenementControler();

            foreach ($liste as $l) {
                $evt = $evtCtrl->getEventById($l->evenement_id);
                $evt->nom = utf8_encode($evt->nom);

                echo "
                <div class='list-thumb'>
                <h4>$l->nom - $evt->nom</h4>
                <p> $l->dateEvenement</p>"
                    . ($l->commentaire == "NULL" ? "" : ("<p>" . $l->commentaire . "</p>")) . "
                </div>
                ";
            }
        }
        ?>
    </div>
</body>
</html>
