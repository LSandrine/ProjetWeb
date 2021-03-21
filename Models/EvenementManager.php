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
		$req = $this->bd->query('SELECT idEvenement, nom, dateEvt, description, idMatiere, typeRendu, idClasse, idType FROM evenement;');
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
	public function getEvenementsByIdClasse($idC){
		$ListeEv = array();
		$req = $this->bd->prepare('SELECT idEvenement, nom, dateEvt, description, idMatiere, typeRendu, idClasse, idType FROM evenement WHERE idClasse = :idClasse;');
		$req->bindValue(':idClasse', $idC, PDO::PARAM_INT);
		$req->execute();
		while($event = $req->fetch(PDO::FETCH_OBJ)){
			$ListeEv[] = new Evenement($event);
		}
		$req->closeCursor();
		return $ListeEv;
	}

	public function getAllDate(){
		$ListeEv = array();
		$req = $this->bd->prepare('SELECT DISTINCT dateEvt FROM evenement;');
		$req->execute();
		while($date = $req->fetch(PDO::FETCH_OBJ)){
			$ListeEv[] = $date;
		}
		$req->closeCursor();
		return $ListeEv;
	}


	public function getEvenementsByIdClasseAndDate($idC, $dateEvt){
		$ListeEv = array();
		$req = $this->bd->prepare('SELECT idEvenement, nom, dateEvt, description, idMatiere, typeRendu, idClasse, idType FROM evenement WHERE idClasse = :idClasse AND dateEvt = :dateEvt;');
		$req->bindValue(':idClasse', $idC, PDO::PARAM_INT);
		$req->bindValue(':dateEvt', $dateEvt, PDO::PARAM_STR);
		$req->execute();
		while($event = $req->fetch(PDO::FETCH_OBJ)){
			$ListeEv[] = new Evenement($event);
		}
		$req->closeCursor();
		return $ListeEv;
	}


	public function getAllDateByClasse($idClasse){
		$ListeEv = array();
		$req = $this->bd->prepare('SELECT DISTINCT dateEvt FROM evenement WHERE idClasse = :idClasse  ORDER BY dateEvt ASC;');
		$req->bindValue(':idClasse', $idClasse, PDO::PARAM_INT);
		$req->execute();
		while($date = $req->fetch(PDO::FETCH_OBJ)){
			$ListeEv[] = $date;
		}
		$req->closeCursor();
		return $ListeEv;
	}

	public function getEventByDateId($date,$idClasse){
		$ListEvF = array();
		$ListEvD = array();
		$tabdate = (array) $date;
		$ListEvD = $this->getEvenementsByIdClasse($idClasse);
		foreach ($tabdate as $date){
			$evtTmp =array();
			foreach($ListEvD as $elem){
				if($elem->getEvtDate() == $date->dateEvt){
					$evtTmp[] = $elem;
				}
			}
			$ListEvF[] =array("date" => $date->dateEvt,"evt" => $evtTmp);
		}
		return $ListEvF;
	}

	public function changeCheckEvenement($idUtilisateur, $idEvenement){
			$req = $this->bd->prepare('INSERT INTO lienutilisateurevenement (idUtilisateur, idEvenement, fait)
				VALUES (:idUtilisateur, :idEvenement, 1)
				ON DUPLICATE KEY UPDATE fait = NOT fait');
			$req->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
			$req->bindValue(':idEvenement', $idEvenement, PDO::PARAM_INT);
			$req->execute();
	}
}
