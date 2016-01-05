
<?php
    include("header.php");
?>
/**
 * Created by PhpStorm.
 * User: agathe
 * Date: 05/01/16
 * Time: 16:28
 */

<!DOCTYPE html>
<html>
     <head>
     </head>
     <body>
     Type : <select name="type">
         <option selected="selected" value="kdo">cadeau</option>
         <option value="liste">liste de cadeaux</option>
     </select>
     <form action="" method="post">
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
     </form>
     </body>
</html>