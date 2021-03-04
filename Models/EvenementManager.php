<?php
/*
* @class Database
* @author  Latour Renut Timimi
*/
class EvenementManager{
	private $bd;

	public function __construct($bd){
		$this->bd = $bd;
	}

	public function add($evenement){
		$req = $this->bd->prepare('INSERT INTO evenement VALUES (:idEvenement, :nom, :date, :description, :matiere, :typeRendu, :idClasse, :idType);');
		$req->bindValue(':idEvenement',$idEvenement->getEvId(),PDO::PARAM_INT);
		$req->bindValue(':nom',$nom->getEvNom(),PDO::PARAM_STR);
		$req->bindValue(':date',$date->getEvDate(),PDO::PARAM_STR);
		$req->bindValue(':description',$description->getEvDesc(),PDO::PARAM_STR);
		$req->bindValue(':matiere',$matiere->getEvMat(),PDO::PARAM_STR);
		$req->bindValue(':typeRendu',$typeRendu->getEvRendu(),PDO::PARAM_STR);
		$req->bindValue(':idClasse',$idClasse->getEvClass(),PDO::PARAM_INT);
		$req->bindValue(':idType',$idType->getEvType(),PDO::PARAM_INT);
		$req->execute();
	}


		public function getEvenementById($id){
			$req = $this->bd->prepare('SELECT idEvenement, nom, date, description, matiere, typeRendu, idClasse, idType FROM evenement WHERE idEvenement = :idEvenement;');
			$req->bindValue(':idEvenement', $id, PDO::PARAM_INT);
			$req->execute();
			$utilisateur = new Evenement($req->fetch(PDO::FETCH_OBJ));
			$req->closeCursor();
			return $evenement;
