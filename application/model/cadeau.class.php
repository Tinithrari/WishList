<?php

namespace model;

include_once "Model.class.php";

/**
 * 
 */
class cadeau extends Model {


	/**
	 * @var String
	 */
	public $nom;

	/**
	 * @var String
	 */
	public $description;

	/**
	 * @var String
	 */
	public $lien;

	/**
	 * @var int
	 */
	public $type_cadeau_id;

	/**
	 * @var int
	 */
	public $liste_id;

}