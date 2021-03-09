<?php
/*
* @class Event Manager
* @author  Latour Renut Timimi
*/
class EvenementManager{
	private $bd;

	public function __construct($bd){
		$this->bd = $bd;
	}

	public function add($evenement){
		$req = $this->bd->prepare('INSERT INTO evenement(nom, dateEvt, description, idMatiere, typeRendu, idClasse, idType) VALUES (:nom, :dateEvt, :description, :idMatiere, :typeRendu, :idClasse, :idType);');
		$req->bindValue(':nom',$evenement->getEvtNom(),PDO::PARAM_STR);
		$req->bindValue(':dateEvt',$evenement->getEvtDate(),PDO::PARAM_STR);
		$req->bindValue(':description',$evenement->getEvtDescription(),PDO::PARAM_STR);
		$req->bindValue(':idMatiere',$evenement->getEvtMatiereId(),PDO::PARAM_STR);
		$req->bindValue(':typeRendu',$evenement->getEvtTypeRendu(),PDO::PARAM_STR);
		$req->bindValue(':idClasse',$evenement->getEvtClasseId(),PDO::PARAM_INT);
		$req->bindValue(':idType',$evenement->getEvtTypeId(),PDO::PARAM_INT);
		$req->execute();
	}


		public function getAll(){
			$ListeEv = array();
			$req = $this->bd->prepare('SELECT idEvenement, nom, dateEvt, description, idMatiere, typeRendu, idClasse, idType FROM evenement;');
			while ($evenement = $req->fetch(PDO::FETCH_OBJ) ) {
				$ListeEv[] = new Evenement($evenement);
			}
			$req->closeCursor();
			return $ListeEv;
		}

		public function getEvenementById($id){
			$req = $this->bd->prepare('SELECT idEvenement, nom, dateEvt, description, idMatiere, typeRendu, idClasse, idType FROM evenement WHERE idEvenement = :idEvenement;');
			$req->bindValue(':idEvenement', $id, PDO::PARAM_INT);
			$req->execute();
			$evenement = new Evenement($req->fetch(PDO::FETCH_OBJ));
			$req->closeCursor();
			return $evenement;
		}
	}
