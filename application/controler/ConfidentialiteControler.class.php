<?php

namespace controler;

use model\Database;
use model\groupeSQL;
use model\restrictionSQL;
use model\utilisateurSQL;

include_once ("../model/Database.class.php");
include_once ("../model/restriction.class.php");
include_once ("../model/groupe.class.php");
include_once ("../model/utilisateur.class.php");


include_once ("../model/restrictionSQL.class.php");
include_once ("../model/groupeSQL.class.php");
include_once ("../model/utilisateurSQL.class.php");

/**
 * 
 */
class ConfidentialiteControler {

	/**
	 * 
	 */
	public function __construct() {
	}

	/**
	 * @param int $uid 
	 * @param int $gid 
	 * @param int $rid
	 */
	public function ajouterRestriction($uid, $gid, $rid)
	{
        $restrictionReader = new restrictionSQL();
        $groupeReader = new groupeSQL();
        $userReader = new utilisateurSQL();

        if ($userReader->findById($uid) == null)
            throw new \InvalidArgumentException("L'utilisateur demandée n'existe pas");
        if ($groupeReader->findById($gid) == null)
            throw new \InvalidArgumentException("Le groupe demandée n'exsiste pas");
        if ($restrictionReader->findById($rid) == null)
            throw new \InvalidArgumentException("La restriction demandée n'existe pas");

        $db = Database::getInstance();

        $db->prepare("INSERT INTO restriction VALUES (?, ?, ?)");
        $db->execute(array($uid, $gid, $rid));
	}

	/**
	 * @param int $uid 
	 * @param int $gid 
	 * @param int $rid
	 */
	public function supprimerRestriction($uid, $gid, $rid){
        $restrictionReader = new restrictionSQL();
        $groupeReader = new groupeSQL();
        $userReader = new utilisateurSQL();

        if ($userReader->findById($uid) == null)
            throw new \InvalidArgumentException("L'utilisateur demandée n'existe pas");
        if ($groupeReader->findById($gid) == null)
            throw new \InvalidArgumentException("Le groupe demandée n'exsiste pas");
        if ($restrictionReader->findById($rid) == null)
            throw new \InvalidArgumentException("La restriction demandée n'existe pas");

        $db = Database::getInstance();

        $db->prepare("DELETE FROM restriction WHERE uid = ? AND gid = ? AND rid = ?");
        $db->execute(array($uid, $gid, $rid));
	}

}