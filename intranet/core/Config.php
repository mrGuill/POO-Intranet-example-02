<?php

// Classe Config = singleton ; une seule instance de cette classe peut-être créée.

namespace Core;

class Config {

	private $settings;
	private static $_instance;

	// Permet de stocker le tableau setting dans une variable $settings.
	public function __construct(){
		$this->settings = require_once(ROOT . '/settings.php');
	}

	public static function getInstance(){
		if (self::$_instance === null){
			self::$_instance = new Config;
		}
		return self::$_instance;
	}

	// Permet de lire l'une des données contenu dans le tableau de settings.
	public function getKey($key){
		return $this->settings[$key];
	}
}

?>