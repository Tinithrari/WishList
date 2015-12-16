<?php

namespace controler;

use model\ModelManager;

include_once("../model/cadeau.class.php");
include_once("../model/ModelManager.class.php");
include_once("../model/cadeauSQL.class.php");

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

}