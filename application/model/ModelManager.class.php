<?php

namespace model;
include_once("Database.class.php");
include_once("Model.class.php");
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
		if ($m == null)
            return;

        if ($m->isNew())
            $this->insert($m);
        else
            $this->update($m);
	}

	/**
	 * @param \model\Model $m
	 */
	public function delete($m){
		if ($m == null || !$m instanceof \model\Model)
			return;

		$tablename = get_class($m);
		$sql = "DELETE FROM ".$tablename." WHERE id=".$m->id;
		$db = Database::getInstance();
		$db->prepare($sql);
		$db->execute(array());
	}

	/**
	 * @param \model\Model $m
	 */
	private function insert($m){
		if ($m==null || !$m instanceof \model\Model)
			return;

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

	}

	/**
	 * @param \model\Model $m
	 */
	private function update($m){
		if ($m==null || !$m instanceof \model\Model)
			return;

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