<?php

// Cette classe ne sera quasiement jamais instanciée, seul ses enfants le seront.

namespace Core\Table;
use \PDO;

class Table{

	protected $tableName;
	protected $dbInstance;

	public function __construct($dbInstance){
		// Récupération de l'instance $db via la factory.
		$this->dbInstance = $dbInstance;

		// Creation du nom de la table (appel des enfants).
		$tableName = get_class($this);
		// Explose une string en fonction d'un delimiter, retourne un array.
		$tableName = explode('\\', $tableName);
		// Retourne le dernier index d'un array.
		$tableName = end($tableName);
		$tableName = strtolower(str_replace('Table', '', $tableName));
		$this->tableName = $tableName;
	}

	// Utilise l'instance BDD pour faire une requête.
	// Le paramètre $className précise si on doit retourner une classe après la requête.
	public function query($statement, $className = null, array $constructorParam = null){
		$req = $this->dbInstance->query($statement);
		// S'il n'y a pas de paramètre $className, alors on retourne le résultat de la requête dans un tableau associatif.
		if($className === null){
			return $req->fetchAll(PDO::FETCH_ASSOC);
		// S'il y a un paramètre $className, alors on retourne le résultat de la requête dans la classe spécifiée; 
		} else {
			return $req->fetchAll(PDO::FETCH_CLASS, $className, $constructorParam);
		}
	}

	public function prepare($statement, $array, $className = null, array $constructorParam = null){
		$req = $this->dbInstance->prepare($statement);
		$req->execute($array);
		if($className === null){
			return $req->fetchAll(PDO::FETCH_ASSOC);
		// S'il y a un paramètre $className, alors on retourne le résultat de la requête dans la classe spécifiée; 
		} else {
			return $req->fetchAll(PDO::FETCH_CLASS, $className, $constructorParam);
		}
	}

	// Permet de récupérer le contenu d'une table entière.
	public function getAll(){
		$req = $this->dbInstance->query('SELECT * from ' . $this->tableName);
		$data = $req->fetchAll();
		return $data;
	}

	// Permet de récupérer une entité en particulier dans la BDD.
	public function getEntity($id){
		$columnId = $this->tableName . 'Id';
		$entityName = '\App\Entity\\' . ucfirst($this->tableName) . 'Entity';
		$statement = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $columnId . ' = ' . $id;
		// On précise dans la requête que l'on veut retourner le résultat sous forme d'une classe Entity - On précise en paramètre un array pour le constructeur d'Entity.
		$entity = $this->query($statement, $entityName);
		return $entity['0'];
	}

}


?>