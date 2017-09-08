<?php

namespace Core\Auth;
use \App\AppController;
use \Core\Session\Session;

class Auth{

	private $dbInstance;

	public function __construct($dbInstance){
		$this->dbInstance = $dbInstance;
	}

	public function loggin($userName, $userPass){
		$statement = 'SELECT * From user WHERE userName = ? AND userPass = ?';
		$array = array($userName, $userPass);

		$userTable = AppController::getInstance()->getTable('user');
		$req = $userTable->prepare($statement, $array);

		// Permet de voir si l'utilisateur est bien dans la BDD, si oui, on démarre sa session.
		if($req){
			$userId = $req['0']['userId'];
			$user = $userTable->getEntity($userId);
			Session::getInstance()->startSession($user);
			return True;
		} else {
			echo 'Authentication failed.';
			return False;
		}
	}

	public function logout(){
		Session::getInstance()->destroySession();
	}

	public function islogged(){
		if(isset($_SESSION['islogged'])){
			return True;
		} else {
			return False;
		}
	}

}

?>