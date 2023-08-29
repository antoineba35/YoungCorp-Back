<?php
include_once ('modeles/DAO.class.php');
$dao = new DAO();

if(empty($_POST ["btnConnecter"])) {
    $login = '';
    $mdp = '';
    $message = '';
    include_once ('vues/VueConnecter.php');
    exit;		
}

// récupération des données postées
if ( empty($_POST['Pseudo']))  $login = '';  else   $login = $_POST['Pseudo'];
if ( empty($_POST['Mdp']))    $mdp = '';    else   $mdp = $_POST['Mdp'];

if ($login == "" || $mdp == "") {
	$message = 'Erreur : données incomplètes.';
    include_once ('vues/VueAccueil.php'); 
    exit;		
}

$utilisateur = $dao->getUnUtilisateur($login, $mdp);

if($utilisateur == null) {
    $message = 'Erreur : données non correctes.';
    include_once ('vues/VueAccueil.php'); 
    exit;
} else {
    $_SESSION['user'] = $utilisateur;
    include_once ('vues/VueAccueil.php'); 
}

include_once ('vues/VueAccueil.php'); 