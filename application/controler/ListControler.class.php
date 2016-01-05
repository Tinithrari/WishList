<?php

namespace controler;

use model\liste;
use model\listeSQL;
use model\ModelManager;

include_once MODEL_PATH . "ModelManager.class.php";
include_once MODEL_PATH . "Liste.class.php";
include_once MODEL_PATH . "listeSQL.class.php";

/**
 * 
 */
class ListControler {

	/**
	 * 
	 */
	public function __construct() {
	}

	/**
	 * @param \model\liste $l
	 */
	public function creerListe(&$l)
	{
		if ($l == null || ! $l instanceof liste || ! $l->isNew())
            return;

        $modelManager = ModelManager::getInstance();

        $modelManager->save($l);
	}

	/**
	 * @param int $user_id
     * @return array La liste des listes d'un utilisateur
	 */
	public function trouverListes($user_id)
	{
		if ($user_id == null || ! is_int($user_id) || $user_id < 1)
            return null;

        $listReader = new listeSQL();

        return $listReader->prepareFindWith("utilisateur_id = ?", array($user_id))->execute();
	}

	/**
	 * @param int $id
     * @return mixed Une liste ou null
	 */
	public function getListeById($id){

        if ($id == null ||! is_int($id) || $id < 1)
            return null;

        $listReader = new ListeSQL();

        return $listReader->findById($id);
	}

	/**
	 * @param \model\liste $l
     * @return mixed The modified list or null
	 */
	public function modifierListe($l)
	{
		if ($l == null ||! $l instanceof  liste || $l->isNew())
            return null;

        $modelManager = ModelManager::getInstance();

        $modelManager->save($l);

        return $l;
	}

	/**
	 * @param \model\liste $l
     * @return boolean l'état de l'opération
	 */
	public function supprimerListe($l)
	{
        if ($l == null ||! $l instanceof  liste || $l->isNew())
            return false;

        $modelManager = ModelManager::getInstance();

        $modelManager->delete($l);

        return true;
	}

}