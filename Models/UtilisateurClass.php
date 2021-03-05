<?php
/*
* @class User
* @author  Latour Renut Timimi
*/

class Utilisateur{
	private $idUtilisateur;
	private $mail;
	private $mdp;
	private $idClasse;
	private $classeUt;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}
	public function affecte($donnee){
		foreach($donnee as $attribut => $valeur){
			$classeUt = new Classe();
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
					$this->setUtClassId($valeur);
					break;
				case 'idClasse':
					$classeUt->setClassId($valeur);
					break;
				case 'promotion':
					$classeUt->setClassPromo($valeur);
					break;
				case 'groupe':
					$classeUt->setClassGrp($valeur);
					break;
				case 'anneeDiplome':
					$classeUt->setClassDip($valeur);
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
	public function setUtClassId($valeur){
		$this->idClasse = $valeur;
	}
	public function setUtClass($valeur){
		$this->classeUt = $valeur;
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
	public function getUtClassId(){
		return $this->idClasse;
	}
	public function getUtClass(){
		return $this->classeUt;
	}
}
