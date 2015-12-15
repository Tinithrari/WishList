<?php

namespace model;
include_once("Database.class.php");
include_once("Model.class.php");
/**
 * 
 */
abstract class Query {


	/**
	 * @var String
	 */
	protected $className;

	/**
	 * @var String
	 */
	protected $tableName;

	/**
	 * @var String
	 */
	protected $sql;

	/**
	 * @var String
	 */
	protected $params;

    /**
     * @var \model\Database
     */
    protected $db;


    private static function stripNamespaceFromClassName($obj){
        $tmp = explode("\\", get_class($obj));
        return end($tmp);
    }
	/**
	 *
	 */
	public function __construct() {
        $this->className = get_class($this);
        $tmp = Query::stripNamespaceFromClassName($this);
        $this->tableName = substr($tmp,0,strlen($tmp)-3);
        $this->db =  \model\Database::getInstance();
	}

	/**
	 * @param int $id
	 */
	public function findById(int $id){
		$this->db->prepare("SELECT * FROM $this->tableName WHERE id=?");
        $this->db->execute(array($id));
        return $this->db->fetch($this->className);
	}

	/**
	 * @param String condition
	 */
	public function prepareFindWith($condition,$params){
        $this->sql = "SELECT * FROM $this->tableName WHERE $condition";
        $this->params = $params;
        return $this;
	}

	/**
	 * 
	 */
	public function prepareFindAll(){
		$this->sql = "SELECT * FROM $this->tableName";
        $this->params = array();
        return $this;
	}

	/**
	 * 
	 */
	public function limit($deb, $nb){
        $this->sql.=" limit $deb,$nb";
        return $this;

	}

	/**
	 * 
	 */
	public function orderBy($order){
        $this->sql.= " ORDER BY $order";
        return $this;

	}

	/**
	 * 
	 */
	public function execute(){
		$this->db->prepare($this->sql);
        $this->db->execute($this->params);
        return $this->db->fetchAll($this->className);
	}

}