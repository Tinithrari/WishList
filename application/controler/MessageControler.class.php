<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 07/01/2016
 * Time: 12:47
 */

namespace controler;

include_once $_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/message.class.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/ModelManager.class.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/messageSQL.class.php";

use model\messageSQL;use model\ModelManager;

class MessageControler
{
    public function createMessage(&$m)
    {
        if ($m == null)
            return;

        $manager = ModelManager::getInstance();

        $manager->save($m);
    }

    public function deleteMessage($m)
    {
        if ($m == null)
            return;

        $manager = ModelManager::getInstance();

        $manager->delete($m);
    }

    public function getMessageById($id)
    {
        if ($id == null)
            return null;

        $reader = new messageSQL();

        return $reader->findById($id);
    }

    public function getAllMessageByListeId($id)
    {
        if ($id == null)
            return null;

        $reader = new messageSQL();

        return $reader->prepareFindWith("liste_id = ?", array($id))->orderBy("id ASC")->execute();
    }
}