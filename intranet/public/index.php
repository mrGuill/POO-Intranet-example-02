<?php
//  On definit le namespace de l'application.
namespace Core;
use \App\AppController;
use \Core\Auth\Auth;

session_start();

// On définit une variable globale pour la racine de notre site / application.
define ('ROOT', dirname(__DIR__));

// On instancie notre factory, qui va permettre de créer toutes les classes dont nous avons besoin pour notre application.
require_once(ROOT . '/app/AppController.php');
AppController::getAutoloader();
$appController = AppController::getInstance();

$auth = new Auth($appController->getDb());

if(isset($_POST['userName']) AND isset($_POST['userPass'])){
	$userName = htmlspecialchars($_POST['userName']);
	$userPass = sha1(htmlspecialchars($_POST['userPass']));
	$auth->loggin($userName, $userPass);
} else {
	
}

// Mini controller de page. On requiert la page demandée via requête GET. Par défaut, on charge la page HOME.
ob_start();

// REVOIR LA PARTIE LOGIN.

if($auth->islogged()){
	if(!isset($_GET['page']) OR $_GET['page'] == 'dashboard'){
		require_once(ROOT . '/public/pages/user/dashboard.php');
	} elseif ($_GET['page'] == 'settings'){
		require_once(ROOT . '/public/pages/user/settings.php');
	} elseif ($_GET['page'] == 'logout') {
		$auth->logout();
	}
} else {
	require_once(ROOT . '/public/pages/login.php');
}

// Ces pages seront mises en tampon et chargées dans une variable $content, affichée dans le script public/pages/templates/default.php.
$content = ob_get_clean();

// On requiert le template par defaut et on affiche la variable content (voir default.php).
require_once(ROOT . '/public/pages/templates/default.php'); 
?>