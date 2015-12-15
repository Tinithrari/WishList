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
            $this->pdo = new \PDO(DSN . DB_NAME, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
	 * 
	 */
	public function prepare($sql){
		$this->stmt = $this->pdo->prepare($sql);
	}

	/**
	 * 
	 */
	public function execute($params)
    {
		if (! isset($this->stmt) && ! is_array($params))
            return 0;

        $this->stmt->execute($params);

        return 1;
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