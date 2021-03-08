<?php
/*
* @class Event
* @author Latour Renut Timimi
*/
class Evenement{
	private $idEvenement;
	private $nom;
	private $dateEvt;
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
  					$this->setEvtId($valeur);
  					break;
  				case 'nom':
  					$this->setEvtNom($valeur);
  					break;
  				case 'dateEvt':
  					$this->setEvtDate($valeur);
  					break;
  				case 'description':
  					$this->setEvtDesc($valeur);
  					break;
  				case 'idMatiere':
  					$this->setEvtMatId($valeur);
  					break;
  				case 'typeRendu':
  					$this->setEvtRendu($valeur);
  					break;
  				case 'idClass':
  					$this->setEvtClassId($valeur);
  					break;
  				case 'idType':
  					$this->setEvtType($valeur);
  					break;
  			}
				$db = Database::getInstance();
				$classe = new ClasseManager($db);
				$matiere = new MatiereManager($db);
				$this->classeEvt = $classe->getClasseById($this->getEvtClassId());
				$this->matiereEvt = $matiere->getMatById($this->getEvtMatId());
  		}
    }

  	public function setEvtId($valeur){
  		$this->idEvenement = $valeur;
  	}
  	public function setEvtNom($valeur){
  		$this->nom = $valeur;
  	}
  	public function setEvtDate($valeur){
  		$this->dateEvt = $valeur;
  	}
  	public function setEvtDesc($valeur){
  		$this->description = $valeur;
  	}
  	public function setEvtMatId($valeur){
  		$this->idMatiere = $valeur;
  	}
  	public function setEvtRendu($valeur){
  		$this->typeRendu = $valeur;
  	}
  	public function setEvtClassId($valeur){
  		$this->idClass = $valeur;
  	}
  	public function setEvtClasse($valeur){
  		$this->classeEvt = $valeur;
  	}
  	public function setEvtType($valeur){
  		$this->type = $valeur;
  	}
  	public function getEvtId(){
  		return $this->idEvenement;
  	}
  	public function getEvtNom(){
  		return $this->nom;
  	}
  	public function getEvtDate(){
  		return $this->dateEvt;
  	}
  	public function getEvtDesc(){
  		return $this->description;
  	}
  	public function getEvtMatId(){
  		return $this->idMatiere;
  	}
  	public function getEvtRendu(){
  		return $this->typeRendu;
  	}
  	public function getEvtClassId(){
  		return $this->idClasse;
  	}
  	public function getEvtClass(){
  		return $this->classeEvt;
  	}
  	public function getEvtType(){
  		return $this->type;
  	}
}
