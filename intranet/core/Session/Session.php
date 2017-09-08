<?php

namespace Core\Session;

class Session{

	private static $_instance;
	private $session;

	public static function getInstance(){
		if(self::$_instance === null){
			self::$_instance = new Session;
		}
		return self::$_instance;
	}

	// Cette fonction est appellée uniquement si l'utilisateur est authentifié.
	public function startSession($user){
		session_start();

		$employeeInfo = $user->getEmployeeInfo();

		$_SESSION['islogged'] = True;
		$_SESSION['userId'] = $user->getUserId();
		$_SESSION['userName'] = $user->getUserName();
		$_SESSION['userPass'] = $user->getUserPass();
		$_SESSION['FirstName'] = $employeeInfo->getFirstName();
		$_SESSION['LastName'] = $employeeInfo->getLastName();
		$_SESSION['Mail'] = $employeeInfo->getMail();
		$_SESSION['Phone'] = $employeeInfo->getPhone();
	}

	public function destroySession(){
		session_unset();
		session_destroy();
		// header('Location: index.php');
	}
}

?>