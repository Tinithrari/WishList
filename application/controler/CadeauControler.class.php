<?php

namespace controler;

use model\cadeauSQL;
use model\ModelManager;

include_once $_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/cadeau.class.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/ModelManager.class.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/cadeauSQL.class.php";

/**
 * 
 */
class CadeauControler {

	/**
	 * 
	 */
	public function __construct() {
	}

	/**
	 * @param \model\cadeau $c
	 */
	public function creerCadeau($c)
	{
        if (! $c->isNew())
            throw new \BadFunctionCallException("Le cadeau existe déjà, merci d'utiliser la fonction modifierCadeau");

        $manager = ModelManager::getInstance();
        $manager->save($c);
	}

	/**
	 * @param \model\cadeau $c
	 */
	public function modifierCadeau($c)
	{
		if ($c->isNew())
            throw new \BadFunctionCallException("Le cadeau n'existe pas, merci d'utiliser la fonction creerCadeau");

        $manager = ModelManager::getInstance();
        $manager->save($c);
	}

	/**
	 * @param \model\cadeau $c
	 */
	public function supprimerCadeau($c)
	{
		if ($c->isNew())
            throw new \BadFunctionCallException("Impossible de supprimer un cadeau qui n'existe pas");

        $manager = ModelManager::getInstance();
        $manager->delete($c);
	}

	public function findAllCadeauxByIdListe($id)
	{
		if ($id == null)
			return null;

		$listReader = new cadeauSQL();


		return $listReader->prepareFindWith("liste_id = ?", array($id))->execute();
	}

}