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
	 * 
	 */
	public function findById(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function prepareFindWIth(){
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