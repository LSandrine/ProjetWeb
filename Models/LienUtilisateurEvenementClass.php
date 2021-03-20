<?php
/*
* @class User
* @author  Latour Renut Timimi
*/
class LienUtilisateurEvenement{
	private $idUtilisateur;
	private $idEvenement;
	private $fait;

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
				case 'idEvenement':
					$this->setEventId($valeur);
					break;
				case 'fait':
					$this->setFait($valeur);
					break;
			}
		}
  }
	public function setUtId($valeur){
		$this->idUtilisateur = $valeur;
	}
	public function setEventId($valeur){
		$this->idEvenement = $valeur;
	}
	public function setFait($valeur){
		$this->fait = $valeur;
	}
	public function getUtId(){
		return $this->idUtilisateur;
	}
	public function getEventId(){
		return $this->idEvenement;
	}
	public function getFait(){
		return $this->fait;
	}
}
