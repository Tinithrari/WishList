<?php

namespace model;
include_once("Database.class.php");

/**
 *
 *
 *
 */
class ModelManager {

	/**
	 *
	 *
	 *
	 */
	private function __construct() {
	}

	/**
	 * @var \model\ModelManager
	 */
	private static $instance;


	/**
	 * @param \model\Model $m
	 */
	public function save($m){
		// TODO: implement here
	}

	/**
	 * @param \model\Model $m
	 */
	public function delete($m){
		// TODO: implement here
	}

	/**
	 * @param \model\Model $m
	 */
	private function insert($m){
		if ($m==null || !$m instanceof \model\Model)
			return false;

		$tablename=get_class($m);
		$sql = "INSERT INTO ".$tablename." values(NULL";

		$var=get_class_vars($tablename);
		for($i = 0; $i < count($var); $i++)
			$sql.=",?";
		$sql.=")";

		$values=array();
		foreach($var as $k => $v)
			$values[] = $m->$k;

		$db = Database::getInstance();
		$db->prepare($sql);
		$db->execute($values);

		$m->id = $db->lastInsertId();
		return true;

	}

	/**
	 * @param \model\Model $m
	 */
	private function update($m){
		if ($m==null || !$m instanceof \model\Model)
			return false;

		$tablename=get_class($m);
		$sql = "UPDATE ".$tablename." SET ";

		$var=get_class_vars($tablename);
		$first = true;
		for($i = 0; $i < count($var); $i++){
			if (!$first)
				$sql.=",";
			$sql.= "?=?";
		}
		$sql.="WHERE id = ?";

		$values=array();
		foreach($var as $k => $v) {
			$values[]=$k;
			$values[] = $m->$k;
		}
		$values[]=$m->id;
		$db = Database::getInstance();
		$db->prepare($sql);
		$db->execute($values);

		return true;
	}

	/**
	 * 
	 */
	public static function getInstance(){
		if (!isset(ModelManager::$instance))
			ModelManager::$instance = new ModelManager();

		return ModelManager::$instance;
	}

}