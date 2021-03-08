<?php
/*
* @class Classe
* @author  Latour Renut Timimi
*/
class TypeEvenement{
	private $idTypeEvenement;
	private $nom;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($donnee){
		foreach($donnee as $attribut => $valeur){
			switch($attribut){
				case 'idTypeEvenement':
					$this->setTypeEvenementId($valeur);
					break;
				case 'nom':
					$this->setTypeEvenementNom($valeur);
					break;
			}
		}
  }

	public function setTypeEvenementId($valeur){
		$this->idTypeEvenement = $valeur;
	}
	public function setTypeEvenementNom($valeur){
		$this->nom = $valeur;
	}

	public function getTypeEvenementId(){
		return $this->idTypeEvenement;
	}
	public function getTypeEvenementNom(){
		return $this->nom;
	}
}
