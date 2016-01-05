<?php
    session_start();
    include_once("application/config.php");
    include_once("application/controler/ListControler.class.php");
    include_once("application/controler/EvenementControler.class.php");
    include_once("header.html");
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
<div class="list-container">
    <h3>Vos listes de souhaits :</h3>
    <?php
        if (! isset($_GET["user_id"]))
            $_GET["user_id"] = $_SESSION["id"];
        $usr_id = $_GET["user_id"];

        $listCtrl = new \controler\ListControler();

        $liste = $listCtrl->trouverListes($usr_id);

        if (! count($liste))
            echo "<p> Aucune liste à afficher </p>";
        else
        {
            $evtCtrl = new \controler\EvenementControler();

            foreach ($liste as $l)
            {
                $evt = $evtCtrl->getEventById($l->evenement_id);

                $evt->nom = utf8_encode($evt->nom);

                echo "
                <div class='list-thumb'>
                <h4>$l->nom - $evt->nom</h4>
                <p> $l->dateEvenement</p>"
                . ($l->commentaire == "NULL" ? "" : ("<p>" . $l->commentaire . "</p>")) ."
                </div>
                ";
            }
        }
    ?>
</div>
