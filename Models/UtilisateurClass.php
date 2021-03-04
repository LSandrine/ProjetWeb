<?php
/*
* @class Database
* @author  Latour Renut Timimi
*/
class Utilisateur{
	private $idUtilisateur;
	private $mail;
	private $mdp;
	private $idClasse;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($donnee){
		foreach($donnee as $attribut => $valeur){
			switch($attribut){
				case 'idUtilisateur':
					$this->setUtId($valeur);
					break;
				case 'mail':
					$this->setUtMail($valeur);
					break;
				case 'mdp':
					$this->setUtmdp($valeur);
					break;
				case 'idClasse':
					$this->setUtClass($valeur);
					break;
			}
		}
  }

	public function setUtId($valeur){
		$this->idUtilisateur = $valeur;
	}
	public function setUtMail($valeur){
		$this->mail = $valeur;
	}
	public function setUtmdp($valeur){
		$this->mdp = $valeur;
	}
	public function setUtClass($valeur){
		$this->idClasse = $valeur;
	}

	public function getUtId(){
		return $this->idUtilisateur;
	}
	public function getUtMail(){
		return $this->mail;
	}
	public function getUtmdp(){
		return $this->mdp;
	}
	public function getUtClass(){
		return $this->idClasse;
	}
}
