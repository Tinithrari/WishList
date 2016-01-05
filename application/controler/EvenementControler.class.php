<?php

namespace controler;

use model\evenement;
use model\evenementSQL;

include_once MODEL_PATH . "evenement.class.php";
include_once MODEL_PATH . "evenementSQL.class.php";

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

        $eventReader = new evenementSQL();

        return $eventReader->findById($id);
	}

	public function getAllEvent()
	{
		$eventReader = new evenementSQL();

		return $eventReader->prepareFindAll()->execute();
	}

}