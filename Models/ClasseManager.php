<?php
/*
* @class Classe Manager
* @author  Latour Renut Timimi
*/
class ClasseManager{
	private $bd;

	public function __construct($bd){
		$this->bd = $bd;
	}

	public function add($evenement){
		$req = $this->bd->prepare('INSERT INTO classe VALUES (:idClasse, :promotion, :groupe, :anneeDiplome);');
		$req->bindValue(':idClasse',$idClasse->getClassId(),PDO::PARAM_INT);
		$req->bindValue(':promotion',$promotion->getClassPromo(),PDO::PARAM_STR);
		$req->bindValue(':groupe',$groupe->getClassGrp(),PDO::PARAM_STR);
		$req->bindValue(':anneeDiplome',$anneeDiplome->getClassDip(),PDO::PARAM_INT);
		$req->execute();
	}

	public function getAll(){
		$ListeClass = array();
		$req = $this->bd->query('SELECT idClasse, promotion, groupe, anneeDiplome FROM classe;');
		while ($classe = $req->fetch(PDO::FETCH_OBJ) ) {
			$ListeClass[] = new Evenement($classe);
		}
		$req->closeCursor();
		return $ListeClass;
	}

	public function getClasseById($id){
		$req = $this->bd->prepare('SELECT idClasse, promotion, groupe, anneeDiplome FROM classe WHERE idClasse = :idClasse;');
		$req->bindValue(':idClasse', $id, PDO::PARAM_INT);
		$req->execute();
		$classe = new Classe($req->fetch(PDO::FETCH_OBJ));
		$req->closeCursor();
		return $classe;
	}
}
