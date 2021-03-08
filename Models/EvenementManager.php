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
		$req = $this->bd->prepare('INSERT INTO evenement VALUES (:idEvenement, :nom, :date, :description, :idMatiere, :typeRendu, :idClasse, :idType);');
		$req->bindValue(':idEvenement',$idEvt->getEvtId(),PDO::PARAM_INT);
		$req->bindValue(':nom',$nom->getEvtNom(),PDO::PARAM_STR);
		$req->bindValue(':date',$date->getEvtDate(),PDO::PARAM_STR);
		$req->bindValue(':description',$description->getEvtDesc(),PDO::PARAM_STR);
		$req->bindValue(':idMatiere',$idMatiere->getEvtMatId(),PDO::PARAM_STR);
		$req->bindValue(':typeRendu',$typeRendu->getEvtRendu(),PDO::PARAM_STR);
		$req->bindValue(':idClasse',$idClasse->getEvtClass(),PDO::PARAM_INT);
		$req->bindValue(':idType',$idType->getEvtType(),PDO::PARAM_INT);
		$req->execute();
	}


		public function getAll(){
			$ListeEv = array();
			$req = $this->bd->query('SELECT idEvenement, nom, date, description, idMatiere, typeRendu, idClasse, idType FROM evenement;');
			while ($evenement = $req->fetch(PDO::FETCH_OBJ) ) {
				$ListeEv[] = new Evenement($evenement);
			}
			$req->closeCursor();
			return $ListeEv;
		}

		public function getEvtById($id){
			$req = $this->bd->prepare('SELECT idEvenement, nom, date, description, idMatiere, typeRendu, idClasse, idType FROM evenement WHERE idEvt = :idEvt;');
			$req->bindValue(':idEvt', $id, PDO::PARAM_INT);
			$req->execute();
			$evenement = new Evenement($req->fetch(PDO::FETCH_OBJ));
			$req->closeCursor();
			return $evenement;
		}
	}
