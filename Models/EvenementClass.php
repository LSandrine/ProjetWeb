<?php
/*
* @class Evt
* @author Latour Renut Timimi
*/
class Evenement{
	private $idEvenement;
	private $nom;
	private $dateEvt;
	private $description;
	private $idMatiere;
	private $matiere;
	private $typeRendu;
	private $idClasse;
	private $classeEvt;
	private $idType;
	private $typeEvt;

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
  					$this->setEvtDescription($valeur);
  					break;
  				case 'idMatiere':
  					$this->setEvtMatiereId($valeur);
  					break;
  				case 'typeRendu':
  					$this->setEvtTypeRendu($valeur);
  					break;
  				case 'idClasse':
  					$this->setEvtClasseId($valeur);
  					break;
  				case 'idType':
  					$this->setEvtTypeId($valeur);
  					break;
  			}
				$db = Database::getInstance();
				$managerMatiere = new MatiereManager($db);
				$managerClasse = new ClasseManager($db);
				$managerType = new TypeEvenementManager($db);
				$this->matiere = $managerMatiere->getMatiereById($this->getEvtMatiereId());
				$this->classeEvt = $managerClasse->getClasseById($this->getEvtClasseId());
				$this->typeEvt = $managerType->getTypeEvtById($this->getEvtTypeId());
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
  	public function setEvtDescription($valeur){
  		$this->description = $valeur;
  	}
  	public function setEvtMatiereId($valeur){
  		$this->idMatiere = $valeur;
  	}
		public function setEvtMatiere($valeur){
  		$this->matiere = $valeur;
  	}
  	public function setEvtTypeRendu($valeur){
  		$this->typeRendu = $valeur;
  	}
  	public function setEvtClasseId($valeur){
  		$this->idClasse = $valeur;
  	}
		public function setEvtClasse($valeur){
  		$this->classeEvt = $valeur;
  	}
  	public function setEvtTypeId($valeur){
  		$this->idType = $valeur;
  	}
		public function setEvtType($valeur){
  		$this->typeEvt = $valeur;
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
  	public function getEvtDescription(){
  		return $this->description;
  	}
  	public function getEvtMatiereId(){
  		return $this->idMatiere;
  	}
		public function getEvtMatiere(){
  		return $this->matiere;
  	}
  	public function getEvtTypeRendu(){
  		return $this->typeRendu;
  	}
  	public function getEvtClasseId(){
  		return $this->idClasse;
  	}
		public function getEvtClasse(){
  		return $this->classeEvt;
  	}
  	public function getEvtTypeId(){
  		return $this->idType;
  	}
		public function getEvtType(){
  		return $this->typeEvt;
  	}
}
