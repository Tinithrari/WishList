<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 06/01/2016
 * Time: 22:02
 */
session_start();

if (! isset ($_SESSION["id"]))
    header("location: index.php");

include_once "application/config.php";

include_once CONTROLER_PATH . "UtilisateurControler.class.php";

if (! isset($_POST["prenom"]) || ! isset($_POST["nom"]) || ! isset($_POST["username"])
    || ! isset($_POST["mail"]) || ! isset($_POST["naissance"])) {
    echo "Erreur: Un des champs pour l'inscription est manquant";
    exit(1);
}
$control = new \controler\UtilisateurControler();

$usr = $control->trouverUtilisateurParId($_SESSION["id"]);

$usr->prenom = $_POST["prenom"];
$usr->nom = $_POST["nom"];
$usr->pseudo = $_POST["username"];
$usr->mail = $_POST["mail"];
$usr->ville = ($_POST["ville"] == null ? "NULL" : $_POST["ville"]);
$usr->naissance = $_POST["naissance"];

if ($_FILES["photo"]["error"] <= 0) {
    $target_dir = "photo/";
    $file = $target_dir . basename($_FILES["photo"]["name"]);

    $uploadOk = 1;
    $imageFileType = pathinfo($file, PATHINFO_EXTENSION);

    $target_file = $target_dir . $_SESSION["id"] . "." . $imageFileType;

    $usr->chemin_photo = $target_file;

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        exit(1);
        // if everything is ok, try to upload file
    } else {
        if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
else
    $usr->chemin_photo = "NULL";

$control->modifierUtilisateur($usr);

header("location: profile.php");
?>