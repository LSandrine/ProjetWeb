<?php
/*
* @class Matiere
* @author  Latour Renut Timimi
*/

class Matiere{
	private $idMatiere;
	private $nom;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}
	public function affecte($donnee){
		foreach($donnee as $attribut => $valeur){
			switch($attribut){
				case 'idMatiere':
					$this->setMatId($valeur);
					break;
				case 'nom':
					$this->setMatNom($valeur);
					break;
			}
		}
  }

	public function setMatId($valeur){
		$this->idMatiere = $valeur;
	}
	public function setMatNom($valeur){
		$this->nom = $valeur;
	}
	public function getMatId(){
		return $this->idMatiere;
	}
	public function getMatNom(){
		return $this->nom;
	}
}
