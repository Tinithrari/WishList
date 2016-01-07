<?php

namespace controler;

include_once($_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/ModelManager.class.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/utilisateur.class.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/utilisateurSQL.class.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/Database.class.php");

use model\Database;
use model\ModelManager;
use model\utilisateur;
use model\utilisateurSQL;

/**
 * 
 */
class UtilisateurControler {

	/**
	 * 
	 */
	public function __construct() {
	}

	/**
	 * @param int $id
     * @return utilisateur L'utilisateur associé à l'id
	 */
	public function trouverUtilisateurParId($id)
	{
		$userReader = new utilisateurSQL();

        return $userReader->findById($id);
	}

    /**
     * @param $pseudo
     * @return utilisateur
     */
    public function trouverUtilisateurParPseudo($pseudo)
    {
        $userReader = new utilisateurSQL();

        return $userReader->prepareFindWith("pseudo = ?", array($pseudo))->execute()[0];
    }

	/**
	 * @param int $id
     * @return la liste des utilisateurs suivant l'utilisateur dont l'id est passé en paramètre
	 */
	public function trouverFollowing($id)
	{
        $userReader = new utilisateurSQL();

        if ($userReader->findById($id) == null)
            throw new \InvalidArgumentException("L'utilisateur n'existe pas");

        $db = Database::getInstance();

        $db->prepare("SELECT * FROM suivi WHERE utilisateur_id_1 = ?");
        $db->execute(array($id));

        $liste_id = $db->fetchAll();

        $liste_user = array();

        foreach ($liste_id as $couple_id)
            $liste_user[] = $userReader->findById($couple_id["utilisateur_id_2"]);

        return $liste_user;
	}

    public function trouverFollowers($id)
    {
        $userReader = new utilisateurSQL();

        if ($userReader->findById($id) == null)
            throw new \InvalidArgumentException("L'utilisateur n'existe pas");

        $db = Database::getInstance();

        $db->prepare("SELECT * FROM suivi WHERE utilisateur_id_2 = ?");
        $db->execute(array($id));

        $liste_id = $db->fetchAll();

        $liste_user = array();

        foreach ($liste_id as $couple_id)
            $liste_user[] = $userReader->findById($couple_id["utilisateur_id_1"]);

        return $liste_user;
    }

	/**
	 * @param int $id_user 
	 * @param int $id_following
	 */
	public function creerFollowingById($id_user, $id_following)
	{
		$userReader = new utilisateurSQL();

        if ($userReader->findById($id_user) == null && $userReader->findById($id_following) == null)
            throw new \InvalidArgumentException("L'un des deux utilisateurs n'existe pas");

        $db = Database::getInstance();

        $db->prepare("INSERT INTO suivi VALUES(?, ?)");
        $db->execute(array($id_user, $id_following));
	}

    /**
     * @param int $id_user
     * @param int $id_following
     */
    public function supprimerFollowingById($id_user, $id_following)
    {
        $userReader = new utilisateurSQL();

        if ($userReader->findById($id_user) == null && $userReader->findById($id_following) == null)
            throw new \InvalidArgumentException("L'un des deux utilisateurs n'existe pas");

        $db = Database::getInstance();

        $db->prepare("DELETE FROM suivi WHERE utilisateur_id_1=? AND utilisateur_id_2=?");
        $db->execute(array($id_user, $id_following));
    }

	/**
	 * @param \model\utilisateur $user
	 */
	public function creerUtilisateur($user)
	{
		if (! $user instanceof utilisateur)
            throw new \InvalidArgumentException("L'argument doit être un utilisateur");

        if (! $user->isNew())
            throw new \BadFunctionCallException("L'utilisateur existe déjà, pour modifier un utilisateur, veuillez utiliser la méthode modifier utilisateur");

        $userManager = ModelManager::getInstance();

        $userManager->save($user);
	}

    /**
     * @param \model\utilisateur $user
     */
    public function modifierUtilisateur($user)
    {
        if (! $user instanceof utilisateur)
            throw new \InvalidArgumentException("L'argument doit être un utilisateur");

        if ($user->isNew())
            throw new \BadFunctionCallException("Impossible de modifier un utilisateur n'existant pas");

        $userManager = ModelManager::getInstance();

        $userManager->save($user);
    }

	/**
	 * @param \model\utilisateur $user
	 */
	public function supprimerUtilisateur($user)
	{
        if (! $user instanceof \model\utilisateur)
            throw new \InvalidArgumentException("L'argument doit être un utilisateur");

        if ($user->isNew())
            throw new \BadFunctionCallException("Impossible de supprimer un utilisateur n'existant pas");

        $userManager = ModelManager::getInstance();

        $userManager->delete($user);
	}

}