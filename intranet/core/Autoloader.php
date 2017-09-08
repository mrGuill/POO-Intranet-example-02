<?php

// L'Autoloader permet de charger les classes à la volée, quand on en a besoin.

namespace Core;

class Autoloader{

	public static function register(){
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	public static function autoload($className){
		require_once(ROOT. '/' . $className . '.php');
	}
}

?>