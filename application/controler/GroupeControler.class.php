<?php

namespace controler;

use model\Database;
use model\groupe;
use model\groupeSQL;
use model\ModelManager;
use model\utilisateurSQL;

include_once ("../model/Database.class.php");
include_once ("../model/groupe.class.php");
include_once ("../model/groupeSQL.class.php");
include_once ("../model/utilisateurSQL.class.php");

/**
 * 
 */
class GroupeControler {

	/**
	 * 
	 */
	public function __construct() {
	}

	/**
	 * @param int $id
	 */
	public function getListGroupesByUserId($id)
	{
        if ($id == null || is_int($id) || $id  < 1)
            return null;

		$groupReader = new groupeSQL();

        return $groupReader->prepareFindWith("utilisateur_id = ?", array($id))->execute();
	}

	/**
	 * @param int $id
	 */
	public function getGroupeById($id)
	{
        if ($id == null || is_int($id) || $id  < 1)
            return null;

		$groupReader = new groupeSQL();

        return $groupReader->findById($id);
	}

	/**
	 * @param \model\groupe $g
	 */
	public function supprimerGroupe(&$g)
	{
        if ($g == null || ! $g instanceof groupe || $g->isNew())
            throw new \BadFunctionCallException("Impossible de supprimer un élément non-existant");

        $manager = ModelManager::getInstance();

        $manager->delete($g);
	}

	/**
	 * @param \model\groupe $g
	 */
	public function saveGroupe($g)
	{
        if ($g == null || ! $g instanceof groupe)
            throw new \InvalidArgumentException("L'argument pour saveGroupe ne peut être null et doit être de type groupe");

        $manager = ModelManager::getInstance();

        $manager->save($g);
	}

	/**
	 * @param \model\utilisateur $u 
	 * @param \model\groupe $g
	 */
	public function ajoutUserToGroupe($u, $g)
	{
		if ($u == null || $g == null)
            throw new \InvalidArgumentException("L'un des arguments en entrées de ajoutUserToGroupe est invalide");

        $db = Database::getInstance();

        $db->prepare("INSERT INTO membre VALUES (?,?)");
        $db->execute(array($g>id, $u->id));
	}

	/**
	 * @param \model\utilisateur $u 
	 * @param \model\groupe $g
	 */
	public function supprimerUserOfGroupe($u, $g)
	{
        if ($u == null || $g == null)
            throw new \InvalidArgumentException("L'un des arguments en entrées de supprimerUserToGroupe est invalide");

        $db = Database::getInstance();

        $db->prepare("DELETE FROM membre WHERE groupe_id = ? AND utilisateur_id = ?");
        $db->execute(array($g->id, $u->id));
	}

	/**
	 * @param int $id
	 */
	public function getMembreOfGroupe($id)
	{
        if ($id == null || ! is_int($id) || $id < 1)
            throw new \InvalidArgumentException("L'un des arguments en entrées de ajoutUserToGroupe est invalide");

        $db = Database::getInstance();

        $db->prepare("SELECT utilisateur_id FROM membre WHERE groupe_id = ?");
        $db->execute(array($id));

        $liste = $db->fetchAll();

        $user_list = array();
        $user_reader = new utilisateurSQL();

        foreach ($liste as $elt)
            $user_list[] = $user_reader->findById($elt["utilisateur_id"]);

        return $user_list;
	}
}