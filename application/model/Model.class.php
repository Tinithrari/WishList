<?php

namespace model;

/**
 * 
 */
abstract class Model {

	/**
	 * 
	 */
	public function __construct() {
	}

	/**
	 * @var int
	 */
	public $id;

	/**
	 * 
	 */
	public function getNomTable(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function isNew(){
		// TODO: implement here
	}

	/**
	 * 
	 */
	public function getId(){
		// TODO: implement here
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id){
		// TODO: implement here
	}

}