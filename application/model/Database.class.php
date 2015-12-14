<?php

namespace model;

/**
 * 
 */
class Database {

	/**
	 * 
	 */
	public function __construct() {
	}

	/**
	 * @var \model\Database
	 */
	private static $instance;

	/**
	 * @var PDO
	 */
	private $pdo;

	/**
	 * @var string
	 */
	private $sql;

	/**
	 * 
	 */
	public static function getInstance(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function prepare(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function execute(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function fetch(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function fetchAll(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function lastInsertId(){
		// TODO: implement here
	}

}