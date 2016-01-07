<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 06/01/2016
 * Time: 21:56
 */

session_start();

if (! isset ($_SESSION["id"]))
    header("location: index.php");

include_once "application/config.php";
include("header.html");
include_once CONTROLER_PATH . "UtilisateurControler.class.php";

$ctrl = new \controler\UtilisateurControler();

$usr = $ctrl->trouverUtilisateurParId($_SESSION["id"]);

?>

<form class="form-container" action="modifyUser.php" method="post" enctype="multipart/form-data">
    <input type="text" name="nom" class="form-control" placeholder="Nom" <?php echo "value='$usr->nom'";?> required>
    <br/>
    <br/>
    <input type="text" name="prenom" class="form-control" placeholder="Prénom" <?php echo "value='$usr->prenom'";?> required>
    <br/>
    <br/>
    <input type="text" name="username" class="form-control" placeholder="Pseudonyme" <?php echo "value='$usr->pseudo'";?> required>
    <br/>
    <br/>
    <input type="email" name="mail" class="form-control" placeholder="E-Mail" <?php echo "value='$usr->mail'";?> required>
    <br/>
    <br/>
    <input type="text" name="ville" class="form-control" placeholder="Ville" <?php echo "value='$usr->ville'";?>>
    <br/>
    <br/>
    <input type="date" name="naissance" class="form-control" <?php echo "value='$usr->naissance'";?> required>
    <br/>
    <br/>
    <input type="file" name="photo" id="photo" class="form-control">
    <br>
    <br>
    <input type="submit" class="btn btn-primary" value="Modifier">
</form>
