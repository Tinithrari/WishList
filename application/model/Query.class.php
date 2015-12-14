<?php

namespace model;

/**
 * 
 */
abstract class Query {

	/**
	 * 
	 */
	public function __construct() {
	}

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