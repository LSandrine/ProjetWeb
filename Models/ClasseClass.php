<?php
/*
* @class Classe
* @author  Latour Renut Timimi
*/
class Classe{
	private $idClasse;
	private $promotion;
	private $groupe;
	private $anneeDiplome;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}
	
	public function affecte($donnee){
		foreach($donnee as $attribut => $valeur){
			switch($attribut){
				case 'idClasse':
					$this->setClassId($valeur);
					break;
				case 'promotion':
					$this->setClassPromo($valeur);
					break;
				case 'groupe':
					$this->setClassGrp($valeur);
					break;
				case 'anneeDiplome':
					$this->setClassDip($valeur);
					break;
			}
		}
  }

	public function setClassId($valeur){
		$this->idClasse = $valeur;
	}
	public function setClassPromo($valeur){
		$this->promotion = $valeur;
	}
	public function setClassGrp($valeur){
		$this->groupe = $valeur;
	}
	public function setClassDip($valeur){
		$this->anneeDiplome = $valeur;
	}

	public function getClassId(){
		return $this->idClasse;
	}
	public function getClassPromo(){
		return $this->promotion;
	}
	public function getClassGrp(){
		return $this->groupe;
	}
	public function getClassDip(){
		return $this->anneeDiplome;
	}
}
