<?php

namespace App\Entity;
use \Core\Entity\Entity;

class EmployeeEntity extends Entity{

	private $employeeId;
	private $employeeFirstName;
	private $employeeLastName;
	private $employeeMail;
	private $employeePhone;
	private $employeeService;

	public function getId(){
		return $this->employeeId;
	}

	public function getFirstName(){
		return $this->employeeFirstName;
	}

	public function getLastName(){
		return $this->employeeLastName;
	}

	public function getMail(){
		return $this->employeeMail;
	}

	public function getPhone(){
		return $this->employeePhone;
	}

	public function getService(){
		return $this->employeeService;
	}

}

?>