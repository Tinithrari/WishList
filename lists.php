<?php
    session_start();
if (! isset ($_SESSION["id"]))
    header("location: index.php");
    include_once("application/config.php");
    include_once("application/model/cadeau.class.php");
    include_once("application/model/liste.class.php");
    include_once("application/controler/ListControler.class.php");
    include_once("application/controler/UtilisateurControler.class.php");
    include_once("application/controler/EvenementControler.class.php");
    include_once("application/controler/CadeauControler.class.php");
    include_once("application/controler/MessageControler.class.php");
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
    <?php
        if ($_GET["type"] == "liste")
        {
            echo "<div class=\"list-container\"><h3>Vos listes de souhaits :</h3><a href='creation.php?type=liste'><p>Créer une liste</p></a>";
            $usr_id = $_SESSION["id"];
            $owner = false;

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
                    <a href='deleteList.php?id=$l->id'>Supprimer la liste</a></div>
                    ";
                }
            }
        }
        else if ($_GET["type"] == "cadeau" && isset($_GET["liste_id"]))
        {
            $listCtrl = new \controler\ListControler();

            $owner = 0;

            $liste = $listCtrl->getListeById($_GET["liste_id"]);

            if ($liste->utilisateur_id != $_SESSION["id"])
            {
                echo "<div class='message-box'>";

                $msg_ctrl = new \controler\MessageControler();
                $usr_ctrl = new \controler\UtilisateurControler();

                $liste_message = $msg_ctrl->getAllMessageByListeId($liste->id);

                foreach ($liste_message as $message)
                {
                    $usr = $usr_ctrl->trouverUtilisateurParId($message->utilisateur_id);
                    echo "<div class='message'>
                    <div class='identite-message'>
                        <img src='$usr->chemin_photo' class='profil-icon'>
                        <p><strong><a href='profile.php?id=$usr->id'>$usr->prenom $usr->nom</a></strong></p>
                        <p>$message->texte</p>"
                        . ($usr->id == $_SESSION["id"] ? "<br><a href='deleteMessage.php?id=$message->id'>Supprimer</a>" : "") . "
                    </div></div>";
                }
                echo "<form method=GET action='envoyerMessage.php'>
                    <input type='hidden' name='liste_id' value='$liste->id'>
                    <textarea name='texte' class='form-control'></textarea>
                    <br>
                    <input type='submit' class='btn btn-primary' value='Envoyer'>
                </form></div>";
            }

            echo "<div class=\"list-container\"><h3>Liste de cadeaux pour la liste: $liste->nom</h3>";
            $usr_id = $_SESSION["id"];

            $usr_liste = $listCtrl->trouverListes($usr_id);

            foreach ($usr_liste as $l)
                if ($l->id == $liste->id) {
                    echo "<a href='creation.php?type=cadeau&liste_id=" . $_GET["liste_id"] . "'><p>Créer un cadeau</p></a>";
                    $owner = true;
                }

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
                        ($c->lien == "NULL" ? "" : ("<p><a href='$c->lien'>" . $c->lien . "</a></p>")) .
                        ($owner ? "<a href='deleteCadeau.php?id=$c->id'>Supprimer le cadeau</a>" : "") ."
                    </div>
                    ";
                }
            }
        }
        else if ($_GET["type"] == "following")
        {
            $ctrl = new \controler\UtilisateurControler();

            $userList = $ctrl->trouverFollowing($_SESSION["id"]);

            echo "<div class=\"list-container\">";

            if (count($userList)) {
                foreach ($userList as $user) {
                    echo "<div class='profil-thumbnail'>
                    <img src='" . ($user->chemin_photo == "NULL" ? "resource/img/DefaultAvatar.png" : $user->chemin_photo) . "' class=\"profil-icon\">
                    <h4><a href='profile.php?id=$user->id'>$user->prenom $user->nom ($user->pseudo)</a></h4>
                    </div>";
                }
            }
            else
                echo "<p> Aucun following à afficher </p>";
        }
        else
        {
            echo "<p>Argument incorrecte pour cette page</p>";
        }
    ?>
</div>
