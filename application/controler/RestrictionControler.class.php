<?php

namespace controler;

use model\restrictionSQL;

include_once ("../model/restriction.class.php");
include_once ("../model/restrictionSQL.class.php");

/**
 * 
 */
class RestrictionControler {

	/**
	 * 
	 */
	public function __construct()
	{
	}

	/**
	 * @param int $id
     * @return L'objet restriction associé à l'id
	 */
	public function getRestrictionById($id)
	{
        if ($id == null || ! is_int($id) || $id < 1)
            throw new \InvalidArgumentException("L'id doit être un entier positif");

        $restrictionReader = new restrictionSQL();

        return $restrictionReader->findById($id);
	}

}