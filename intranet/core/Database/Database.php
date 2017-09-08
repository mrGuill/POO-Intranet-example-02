<?php

namespace Core\Database;
use PDO;

class Database{

	private $dbName;
	private $dbHost;
	private $dbUser;
	private $dbPass;
	private $connection;
	private static $_instance;

	public function __construct($settings){
		$this->dbName = $settings->getKey('dbName');
		$this->dbHost = $settings->getKey('dbHost');
		$this->dbUser = $settings->getKey('dbUser');
		$this->dbPass = $settings->getKey('dbPass');
		$this->connection = new PDO('mysql:dbname=' . $this->dbName .';host=' . $this->dbHost, $this->dbUser, $this->dbPass);
	}

	public static function getInstance($settings){
		if (self::$_instance === null){
			self::$_instance = new Database($settings);
		}
		return self::$_instance;
	}

	public function getConnection(){
		return $this->connection;
	}

}

?>