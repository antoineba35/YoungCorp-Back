<?php

    include_once ('../modeles/DAO.class.php');
    $dao = new DAO();

    if(empty($_POST["modifierUser"])) {
        $message = '';
        header ("Location: ../index.php?action=Admin&onglet=users");
        exit;		
    }

    if ( empty($_POST['pseudo']))  $login = '';  else   $login = $_POST['pseudo'];
    if ( empty($_POST['adrMail']))    $mdp = '';    else   $mdp = $_POST['adrMail'];
    if ( empty($_POST['adrMail']))    $adrMail = '';    else   $adrMail = $_POST['adrMail'];
    if ( empty($_POST['admin']))    $admin = '';    else   $admin = $_POST['admin'];
    if ( empty($_POST['idUser']))    $idUser = '';    else   $idUser = $_POST['idUser'];
    if ( empty($_POST['modifUser']))    $modifUser = '';    else   $modifUser = $_POST['modifUser'];
    echo $dao->getEmailDejaExistant($adrMail);
    // verifier si l'adresse mail n'existe pas deja
    if($dao->getEmailDejaExistant($adrMail) == false){
        $message = 'Et non ca existe deja trouduc';
        header ("Location: ../index.php?action=Admin&onglet=users");
        exit;	
    }

    echo $login;
    echo $mdp;
    echo $admin;
    echo $modifUser;
    echo $idUser;   
?>