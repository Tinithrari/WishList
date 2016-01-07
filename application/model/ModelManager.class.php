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
	 * @var \model\ModelManager
	 */
	private static $instance;

    private static function stripNamespaceFromClassName($obj){
        $tmp = explode("\\",$obj);
        return end($tmp);
    }

    /**
     *
     *
     *
     */
    private function __construct() {
    }

	/**
	 * @param \model\Model $m
	 */
	public function save(&$m){
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
	public function delete(&$m){
		if ($m == null || !$m instanceof \model\Model)
			return;

		$tablename = ModelManager::stripNamespaceFromClassName(get_class($m));
		$sql = "DELETE FROM ".$tablename." WHERE id=".$m->id;
		$db = Database::getInstance();
		$db->prepare($sql);
		$db->execute(array());
	}

	/**
	 * @param \model\Model $m
	 */
	private function insert(&$m){
		if ($m==null || !$m instanceof \model\Model)
			return;
        $classe = get_class($m);
		$tablename = ModelManager::stripNamespaceFromClassName($classe);
		$sql = "INSERT INTO ".$tablename." values(NULL";

		$var=get_class_vars($classe);

		for($i = 0; $i < count($var) - 1; $i++)
			$sql.=",?";
		$sql.=")";

		$values=array();
		foreach($var as $k => $v)
			if ($k != "id")
				$values[] = $m->$k;

		$db = Database::getInstance();
		$db->prepare($sql);
		$db->execute($values);

		$m->id = $db->lastInsertId();

	}

	/**
	 * @param \model\Model $m
	 */
	private function update(&$m){
		if ($m==null || !$m instanceof \model\Model)
			return;
        $classe = get_class($m);
		$tablename = ModelManager::stripNamespaceFromClassName($classe);
		$sql = "UPDATE ".$tablename." SET ";

		$var=get_class_vars($classe);
		$first = true;

		$cle = array_keys($var);

		for($i = 0; $i < count($var) - 1; $i++){
			if (!$first)
				$sql.=", ";
			$sql.= "$cle[$i]=?";
			$first=false;
		}
		$sql.=" WHERE id = ?";

		echo $sql;

		$values=array();
		foreach($var as $k => $v) {
			if ($k != "id")
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