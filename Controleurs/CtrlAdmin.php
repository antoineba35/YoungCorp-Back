<?php 
 
if(! isset($_SESSION['user'])) {
    header ("Location: index.php?action=Accueil");
    exit;
}  

include_once ('vues/VueAdmin.php'); 