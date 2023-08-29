<h1>Utilisateurs</h1>

<?php
include_once ('modeles/DAO.class.php');
$dao = new DAO();

$lesProfils = array();
$lesProfils    = $dao->getTousLesUtilisateurs();

if ( ! isset ($_POST['idUSer']))  $idUser = -1;  else   $idUser = $_POST['idUSer'];
if ( ! isset ($_POST['modifUser']))  $modif = "";  else   $modif = $_POST['modifUser'];

switch($modif){
    case 'delete':{
        break;
    }
    case 'modif':{
        include('VueAdmin.user.modif.php'); 
        break;
    }
    default:{
        include('VueAdmin.user.list.php'); 
        break;
    }
}

?>

