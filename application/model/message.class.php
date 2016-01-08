<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 07/01/2016
 * Time: 12:45
 */

namespace model;

include_once "Model.class.php";

class message extends Model
{
    public $texte;
    public $utilisateur_id;
    public $liste_id;
}