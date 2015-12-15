<?php

namespace model;
include_once("Database.class.php");
include_once("Model.class.php")
/**
 * 
 */
abstract class Query {

	/**
	 * @var String
	 */
	private $tableName;

	/**
	 * @var String
	 */
	private $sql;

	/**
	 * @var String
	 */
	private $params;

    private static function stripNamespaceFromClassName($obj){
        $tmp = explode("\\", get_class($obj));
        return end($tmp);
    }
	/**
	 *
	 */
	public function __construct() {
	}

	/**
	 * @param int $id
	 */
	public function findById(int $id){
		// TODO: implement here
	}

	/**
	 * @param String condition
	 */
	public function prepareFindWith(String $condition){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function prepareFindAll(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function limit(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function orderBy(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function execute(){
		// TODO: implement here
	}

}