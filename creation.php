
<?php
    session_start();
/**
 * Created by PhpStorm.
 * User: agathe
 * Date: 05/01/16
 * Time: 16:28
 */
    // include_once ("service/check_auth.php");

    if (! isset($_GET["type"]))
        header("location: profile.php");

    include_once "application/config.php";
    include "header.html";
    include_once CONTROLER_PATH . "EvenementControler.class.php";
    include_once CONTROLER_PATH . "TypeCadeauControler.class.php";

    if ($_GET["type"] == "cadeau")
    {
echo "
            <form action='createCadeau.php' method='get' class='form-container'>
                <label for='nom'>Nom</label><input type='text' name='nom' id='nom' class='form-control' required>
                <label for='description'>Description du cadeau (250 caractère maximum, facultatif)</label>
                <label for='lien'>Lien (facultatif)</label><input type='text' name='lien' id='lien' class='form-control'>
                <textarea rows='3' name='description' id='description' cols='30' maxlength='250' class='form-control'></textarea>
                <label for='typeCadeau'>Type d'évènement</label><select class='form-control' name='idEvenement' id='typeEvenement' required>
                <option selected>Sélectionner un évènement</option>";

$ctrl = new \controler\type_cadeauControler();

$typeCadeau_list = $ctrl->getAllType();

foreach ($typeCadeau_list as $type)
{
    $type->nom = utf8_encode($type->nom);
    echo "<option value='$evt->id'>$evt->nom</option>";
    }

    else if ($_GET["type"] == "liste")
    {
        echo "
            <form action='createList.php' method='get' class='form-container'>
                <label for='nom'>Nom</label><input type='text' name='nom' id='nom' class='form-control' required>
                <label for='date'>Date de l'évènement</label><input type='date' name='date' id='date' class='form-control' required>
                <label for='commentaire'>Commentaire (250 caractère maximum, facultatif)</label>
                <textarea rows='3' name='commentaire' id='commentaire' cols='30' maxlength='250' class='form-control'></textarea>
                <label for='typeEvenement'>Type d'évènement</label><select class='form-control' name='idEvenement' id='typeEvenement' required>
                <option selected>Sélectionner un évènement</option>";

                $ctrl = new \controler\EvenementControler();

                $evt_list = $ctrl->getAllEvent();

                foreach ($evt_list as $evt)
                {
                    $evt->nom = utf8_encode($evt->nom);
                    echo "<option value='$evt->id'>$evt->nom</option>";
                }

                echo "</select>
                <input type='submit' class='btn btn-primary' value='Créer la liste'>
            </form>
            <form class='form-container'>
                 <label for='eventName'>Nouveau type d'évènement: </label><input type='text' name='eventName' id='newEvent' class='form-control'>
                 <input type='submit' class='btn btn-primary' value='Envoyer la requête'>
            </form>";
    }
    else
    {
        echo "<p>Erreur: Le type d'ajout n'est pas spécifié</p>";
        exit(1);
    }
?>

<!--form action="" method="post">
    Nom : <input name="nom" value="nomKDO" type="text">
    Description : <textarea name="description" rows="3" cols="30" ></textarea>
    Lien : <input name="lien" value="lienKDO" type="text">
    Type de cadeau : Type : <select name="typeKDO">
        <option selected="selected" value=none>Sélectionnez un type de cadeau</option>
        <option value="livre">Livre</option>
        <option value="musique">Musique</option>
        <option value="voyage">Voyage</option>
        <option value="soin">Soin</option>
        <option value="cartekdo">Carte Cadeau</option>

        <input name="nom" value="Valider" type="submit">
    </select>
</form-->
</body>
</html>
