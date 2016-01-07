<?php

namespace model;

include_once("config.php");

/**
 * 
 */
class Database {
	/**
	 * @var \model\Database
	 */
	private static $instance;

	/**
	 * @var PDO
	 */
	private $pdo;
    private $stmt;

    private function __construct()
    {

        try
        {
            $this->pdo = new \PDO(DSN, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->stmt = new \PDOStatement();

        }
        catch (\PDOException $e)
        {
            echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
            exit(1);
        }
    }


    /**
	 * 
	 */
	public static function getInstance(){

		if (! isset(Database::$instance))
            Database::$instance = new Database();

        return Database::$instance;

	}

	/**
	 * @param String $sql
	 */
	public function prepare($sql){
		$this->stmt = $this->pdo->prepare($sql);
	}

	/**
	 * @param array $params
	 */
	public function execute($params)
    {
		if (! isset($this->stmt) && ! is_array($params))
            return;

        $this->stmt->execute($params);
	}

	/**
	 * @return mixed
	 */
	public function fetch($classname = false){
        if (! $classname)
		    $this->stmt->setFetchMode(\PDO::FETCH_ASSOC);
        else
			$this->stmt->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, $classname);

		return $this->stmt->fetch();
	}

	/**
	 * 
	 */
	public function fetchAll($classname = false){
        if (! $classname)
            return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->stmt->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, $classname);
	}

	/**
	 * 
	 */
	public function lastInsertId(){
		return $this->pdo->lastInsertId();
	}

}