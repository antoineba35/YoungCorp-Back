<?php

include_once ('modeles/Profil.class.php');
session_start();	

if ( ! isset ($_GET['action']) == true)  $action = '';  else   $action = $_GET['action']; 
if ( ! isset ($_GET['onglet']) == true)  $onglet = '';  else   $onglet = $_GET['onglet'];

$message = "";	
switch($action){
	case 'Connecter': {
		include_once ('Controleurs/CtrlConnecter.php'); break;
	}
    case 'Admin': {
		include_once ('Controleurs/CtrlAdmin.php'); break;
	}
	default : {
		$_SESSION['user']	= null;
		include_once ('vues/VueAccueil.php'); break;
	}
}
