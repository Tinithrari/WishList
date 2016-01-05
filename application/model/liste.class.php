<?php

namespace model;

include_once ("Model.class.php");

/**
 * 
 */
class liste extends Model {


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
	public $utilisateur_id;

	/**
	 * @var int
	 */
	public $evenement_id;

}