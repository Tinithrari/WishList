<?php
    session_start();
if (! isset ($_SESSION["id"]))
    header("location: index.php");
    include_once("application/config.php");
    include_once("application/model/cadeau.class.php");
    include_once("application/model/liste.class.php");
    include_once("application/controler/ListControler.class.php");
    include_once("application/controler/EvenementControler.class.php");
    include_once("application/controler/CadeauControler.class.php");
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
    <?php
        if ($_GET["type"] == "liste")
        {
            echo "<h3>Vos listes de souhaits :</h3><a href='creation.php?type=liste'><p>Créer une liste</p></a>";
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
                    <a href='lists.php?type=cadeau&liste_id=" . $l->id . "'><h4>$l->nom - $evt->nom</h4></a>
                    <p> $l->dateEvenement</p>"
                        . ($l->commentaire == "NULL" ? "" : ("<p>" . $l->commentaire . "</p>")) . "
                    </div>
                    ";
                }
            }
        }
        else if ($_GET["type"] == "cadeau" && isset($_GET["liste_id"]))
        {
            $listCtrl = new \controler\ListControler();

            $liste = $listCtrl->getListeById($_GET["liste_id"]);

            echo "<h3>Liste de cadeaux pour la liste: $liste->nom</h3>";
            $usr_id = $_SESSION["id"];

            $usr_liste = $listCtrl->trouverListes($usr_id);

            foreach ($usr_liste as $l)
                if ($l->id == $liste->id)
                    echo "<a href='creation.php?type=cadeau&liste_id=" . $_GET["liste_id"] . "'><p>Créer un cadeau</p></a>";

            $cadeauCtrl = new \controler\CadeauControler();

            $cadeaux = $cadeauCtrl->findAllCadeauxByIdListe($_GET["liste_id"]);

            if (!count($cadeaux))
                echo "<p> Aucun cadeau à afficher </p>";
            else {

                foreach ($cadeaux as $c) {

                    echo "
                    <div class='list-thumb'>
                    <h4>$c->nom</h4>"
                    . ($c->description == "NULL" ? "" : ("<p>" . $c->description . "</p>")) .
                        ($c->lien == "NULL" ? "" : ("<p><a href='$c->lien'>" . $c->lien . "</a></p>")) . "
                    </div>
                    ";
                }
            }
        }
        else
        {
            echo "<p>Argument incorrecte pour cette page</p>";
        }
    ?>
</div>
