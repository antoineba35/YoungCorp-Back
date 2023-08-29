<?php

include_once ('parametre.php');
include_once ('Profil.class.php');

class DAO 
{
    private $cnx;

    public function __construct() {
        global $PARAM_HOTE, $PARAM_PORT, $PARAM_BDD, $PARAM_USER, $PARAM_PWD;
        try
        {	
            $this->cnx = new PDO ("mysql:host=" . $PARAM_HOTE . ";port=" . $PARAM_PORT . ";dbname=" . $PARAM_BDD, $PARAM_USER, $PARAM_PWD);
        }
        catch (Exception $ex)
        {	
            echo ("Echec de la connexion a la base de donnees <br>");
            echo ("Erreur numero : " . $ex->getCode() . "<br />" . "Description : " . $ex->getMessage() . "<br>");
            echo ("PARAM_HOTE = " . $PARAM_HOTE);
        }
    }
    public function __destruct() {
        // ferme la connexion à MySQL :
        unset($this->cnx);
    }

    public function getUnUtilisateur($login, $mdp) {
        $txtReq = "SELECT * FROM Profil WHERE pseudo = :pseudo AND motPasse = :mdp";

        $req = $this->cnx->prepare($txtReq);
        $req->bindValue("pseudo", $login, PDO::PARAM_STR);
        $req->bindValue("mdp", sha1($mdp), PDO::PARAM_STR);
        
        $req->execute();
        $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        
        $req->closeCursor();

        if ( ! $uneLigne) {
            return null;
        }
        else {
            $unUtilisateur = new Profil($uneLigne->idProfil, $login, $uneLigne->email, $uneLigne->admin);
            return $unUtilisateur;
        }
    }

    public function getUnProfilParId($idProfil) {
        $txtReq = "SELECT * FROM Profil WHERE idProfil = :id";

        $req = $this->cnx->prepare($txtReq);
        $req->bindValue("id", $idProfil, PDO::PARAM_STR);
        
        $req->execute();
        $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        
        $req->closeCursor();

        if ( ! $uneLigne) {
            return null;
        }
        else {
            $unUtilisateur = new Profil($idProfil, $uneLigne->pseudo, $uneLigne->email, $uneLigne->admin);
            return $unUtilisateur;
        }
    }

    public function getEmailDejaExistant($email) {
        $txtReq = "SELECT * FROM Profil WHERE email = :mail";

        $req = $this->cnx->prepare($txtReq);
        $req->bindValue("mail", $email, PDO::PARAM_STR);
        
        $req->execute();
        $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        
        $req->closeCursor();

        if ( ! $uneLigne) {
            return true;
        }
        else {
            return false;
        }
    }

    public function setUnUtilisateur($login, $mail, $mdp) {
        $txtReq = "INSERT INTO `Profil`( `pseudo`, `motPasse`, `email`) ";
        $txtReq .= "VALUES (:user, :mdp, :mail)";

        $req = $this->cnx->prepare($txtReq);
        $req->bindValue("user", $login, PDO::PARAM_STR);
        $req->bindValue("mail", $mail, PDO::PARAM_STR);
        $req->bindValue("mdp", sha1($mdp), PDO::PARAM_STR);
        
        $req->execute();
    }

    public function getTousLesUtilisateurs(){
        $txtReq  = "SELECT * FROM Profil";
        $req    = $this->cnx->prepare($txtReq);
        $req->execute();
        $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        
        $lesUtilisateurs = array();

        while ($uneLigne) {
            // création d'un objet Utilisateur
            $unId = ($uneLigne->idProfil);
            $unPseudo = ($uneLigne->pseudo);
            $unMail = ($uneLigne->email);
            $estAdmin = ($uneLigne->admin);
            
            $unUtilisateur = new Profil($unId, $unPseudo, $unMail, $estAdmin);
            
            $lesUtilisateurs[] = $unUtilisateur;
            $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        }
        // libère les ressources du jeu de données
        $req->closeCursor();
        
        return $lesUtilisateurs;
    }
}