<?php

namespace model;

include_once MODEL_PATH . "Model.class.php";

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
	public $dateEvenement;

	/**
	 * @var String
	 */
	public $commentaire;

	/**
	 * @var int
	 */
	public $liste_id;

	/**
	 * @var int
	 */
	public $utilisateur_id;

}