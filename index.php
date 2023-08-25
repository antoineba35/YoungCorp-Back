<?php

session_start();
include_once('vues/VueAccueil.php');

if (!isset($_GET['action']) == true)  $action = 'Connecter';
else   $action = $_GET['action'];

if ($action == '' || $action == 'Connecter') {
	unset($_SESSION['niveauConnexion']);
}

$message = "";

switch ($action) {
	case 'Accueil': {
			include_once('Vues/VueAccueil.php');
			break;
		}
	case 'testRaph': {
			include_once('controleurs/CtrlTweet.php');
			break;
		}
	case 'testAntoine': {
			include_once('vues/vueTest.php');
			break;
		}
		// case 'inscription': {
		// 		include_once('controleurs/CtrlInscription.php');
		// 		break;
		// 	}
		// case 'codeCR': {
		// 		include_once('controleurs/CtrlUserCR.php');
		// 		break;
		// 	}
	default: {
			// toute autre tentative est automatiquement redirigée vers le contrôleur d'authentification
			include_once('controleurs/CtrlConnecter.php');
			break;
		}
}
