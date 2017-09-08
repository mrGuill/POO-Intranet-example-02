<?php

namespace App\Entity;
use \Core\Entity\Entity;

class ProjectEntity extends Entity{

	private $projectId;
	private $customerId;
	private $projectName;

	public function getId(){
		return $this->projectId;
	}

	public function getCustomerInfo(){
	}

	public function getName(){
		return $this->projectName;
	}

}

?>