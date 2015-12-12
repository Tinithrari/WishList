<?php

namespace model;

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
	public $utilisateur_id;

	/**
	 * @var int
	 */
	public $evenement_id;

}