<?php

class Profil
{
    private $id = "";             
	private $pseudo = "";    			
	private $adrMail = "";  
    private $estAdmin = false;     
	
	public function __construct($unId, $unPseudo,  $uneAdrMail, $admin) {
		$this->id = $unId;
		$this->pseudo = $unPseudo;
		$this->adrMail = $uneAdrMail;
		$this->estAdmin = $admin;
	}	

    public function getId() {return $this->id;}
    public function getPseudo() {return $this->pseudo;}
    public function getMail() {return $this->adrMail;}
    public function getEstAdmin() {return $this->estAdmin;}

	public function toString() {
		$msg = $this->pseudo;
		return $msg;
	}
}