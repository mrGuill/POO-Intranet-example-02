<?php

namespace App\Entity;
use \Core\Entity\Entity;

class CustomerEntity{

	private $customerId;
	private $customerName;
	private $customerAddress;
	private $customerPhone;

	public function getId(){
		return $this->customerId;
	}

	public function getName(){
		return $this->customerName;
	}

	public function getAddress(){
		return $this->customerAddress;
	}

	public function getPhone(){
		return $this->customerPhone;
	}

}


?>