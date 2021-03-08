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
	private $idMatiere;
	private $matiereEvt;
	private $typeRendu;
	private $idClasse;
	private $classeEvt;
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
  					$this->setEvId($valeur);
  					break;
  				case 'nom':
  					$this->setEvNom($valeur);
  					break;
  				case 'date':
  					$this->setEvDate($valeur);
  					break;
  				case 'description':
  					$this->setEvDesc($valeur);
  					break;
  				case 'idMatiere':
  					$this->setEvMatId($valeur);
  					break;
  				case 'typeRendu':
  					$this->setEvRendu($valeur);
  					break;
  				case 'idClass':
  					$this->setEvClassId($valeur);
  					break;
  				case 'idType':
  					$this->setEvType($valeur);
  					break;
  			}
				$db = Database::getInstance();
				$classe = new ClasseManager($db);
				$matiere = new MatiereManager($db);
				$this->classeEvt = $classe->getClasseById($this->getEvClassId());
				$this->matiereEvt = $matiere->getMatById($this->getEvMatId());
  		}
    }

  	public function setEvId($valeur){
  		$this->idEvenement = $valeur;
  	}
  	public function setEvNom($valeur){
  		$this->nom = $valeur;
  	}
  	public function setEvDate($valeur){
  		$this->date = $valeur;
  	}
  	public function setEvDesc($valeur){
  		$this->description = $valeur;
  	}
  	public function setEvMatId($valeur){
  		$this->idMatiere = $valeur;
  	}
  	public function setEvRendu($valeur){
  		$this->typeRendu = $valeur;
  	}
  	public function setEvClassId($valeur){
  		$this->idClass = $valeur;
  	}
  	public function setEvClasse($valeur){
  		$this->classeEvt = $valeur;
  	}
  	public function setEvType($valeur){
  		$this->type = $valeur;
  	}
  	public function getEvId(){
  		return $this->idEvenement;
  	}
  	public function getEvNom(){
  		return $this->nom;
  	}
  	public function getEvDate(){
  		return $this->date;
  	}
  	public function getEvDesc(){
  		return $this->description;
  	}
  	public function getEvMatId(){
  		return $this->idMatiere;
  	}
  	public function getEvRendu(){
  		return $this->typeRendu;
  	}
  	public function getEvClassId(){
  		return $this->idClasse;
  	}
  	public function getEvClass(){
  		return $this->classeEvt;
  	}
  	public function getEvType(){
  		return $this->type;
  	}
}
