<?php

namespace controler;

use model\listeSQL;

include_once ("../model/evenement.class.php");
include_once ("../model/evenementSQL.class.php");

/**
 * 
 */
class EvenementControler {

	/**
	 * 
	 */
	public function __construct()
	{
	}

	/**
	 * @param int $id
     * @return mixed Retourne l'évènement associé à l'id
	 */
	public function getEventById($id)
	{
        if ($id == null || ! is_int($id) || $id  < 1)

        $eventReader = new listeSQL();

        return $eventReader->findById($id);
	}

}