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
		$this->id = null;
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
		return $this->id === null;
	}

}