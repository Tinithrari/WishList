<?php

namespace model;

include_once MODEL_PATH . "Model.class.php";

/**
 * 
 */
class groupe extends Model {


	/**
	 * @var String
	 */
	public $nom;

	/**
	 * @var int
	 */
	public $utilisateur_id;

}