<?php

namespace App\Entity;
use \Core\Entity\Entity;
use \App\AppController;

class UserEntity extends Entity{

	private $userId;
	private $userName;
	private $userPass;
	private $userEmployee;

	public function getUserId(){
		return $this->userId;
	}
	
	public function getUserName(){
		return $this->userName;
	}
	
	public function getUserPass(){
		return $this->userPass;
	}
	
	public function getEmployeeInfo(){
		$statement = 'SELECT * from employee WHERE employeeId = ' . $this->userId;
		return AppController::getInstance()->getTable('employee')->getEntity($this->userEmployee);
	}
	
}

?>