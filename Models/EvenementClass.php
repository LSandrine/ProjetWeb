<?php
/*
* @class Event
* @author Latour Renut Timimi
*/
class Evenement{
	private $idEvenement;
	private $nom;
	private $date;
	private $description;
	private $matiere;
	private $typeRendu;
	private $idClasse;
	private $idType;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

  	public function affecte($donnee){
  		foreach($donnee as $attribut => $valeur){
  			switch($attribut){
  				case 'idEvenement':
  					$this->setUtId($valeur);
  					break;
  				case 'nom':
  					$this->setUtMail($valeur);
  					break;
  				case 'date':
  					$this->setUtmdp($valeur);
  					break;
  				case 'description':
  					$this->setUtClass($valeur);
  					break;
  				case 'matiere':
  					$this->setUtClass($valeur);
  					break;
  				case 'typeRendu':
  					$this->setUtClass($valeur);
  					break;
  				case 'idClass':
  					$this->setUtClass($valeur);
  					break;
  				case 'idType':
  					$this->setUtClass($valeur);
  					break;
  			}
  		}
    }

  	public function setEvId($valeur){
  		$this->idEvenement = $valeur;
  	}
  	public function setEvNom($valeur){
  		$this->nom = $valeur;
  	}
  	public function setEvDate($valeur){
  		$this->nom = $valeur;
  	}
  	public function setEvDesc($valeur){
  		$this->nom = $valeur;
  	}
  	public function setEvMat($valeur){
  		$this->nom = $valeur;
  	}
  	public function setEvRendu($valeur){
  		$this->nom = $valeur;
  	}
  	public function setEvClass($valeur){
  		$this->nom = $valeur;
  	}
  	public function setEvType($valeur){
  		$this->nom = $valeur;
  	}
  	public function getEvId(){
  		return $this->idEvenement;
  	}
  	public function getEvNom(){
  		return $this->idEvenement;
  	}
  	public function getEvDate(){
  		return $this->idEvenement;
  	}
  	public function getEvDesc(){
  		return $this->idEvenement;
  	}
  	public function getEvMat(){
  		return $this->idEvenement;
  	}
  	public function getEvRendu(){
  		return $this->idEvenement;
  	}
  	public function getEvClass(){
  		return $this->idEvenement;
  	}
  	public function getEvType(){
  		return $this->idEvenement;
  	}
