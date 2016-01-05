<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 05/01/2016
 * Time: 22:55
 */

namespace controler;

use model\type_cadeau;
use model\type_cadeauSQL;

include_once $_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/type_cadeauSQL.class.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/starwish/application/model/type_cadeau.class.php";


class TypeCadeauControler
{
    public function __construct()
    {
    }

    /**
     * @return type_cadeau
     */
    public function getTypeCadeauById($id)
    {
        $reader = new type_cadeauSQL();

        return $reader->findById($id);
    }
}