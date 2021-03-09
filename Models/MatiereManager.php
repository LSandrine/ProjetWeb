<?php
/*
* @class Matiere
* @author  Latour Renut Timimi
*/
class MatiereManager{
	private $bd;

	public function __construct($bd){
		$this->bd = $bd;
	}

	public function add($matiere){
		$req = $this->bd->prepare('INSERT INTO matiere VALUES (:idMatiere, :nom);');
		$req->bindValue(':idMatiere',$matiere->getMatId(),PDO::PARAM_INT);
		$req->bindValue(':nom',$matiere->getMatNom(),PDO::PARAM_STR);
		$req->execute();
	}

	public function getAll(){
		$ListeMat = array();
		$req = $this->bd->prepare('SELECT idMatiere, nom FROM matiere;');
		while ($matiere = $req->fetch(PDO::FETCH_OBJ) ) {
			$ListeMat[] = new Matiere($matiere);
		}
		$req->closeCursor();
		return $ListeMat;
	}

	public function getMatiereById($id){
		$req = $this->bd->prepare('SELECT idMatiere, nom FROM matiere WHERE idMatiere = :idMatiere;');
		$req->bindValue(':idMatiere', $id, PDO::PARAM_INT);
		$req->execute();
		$matiere = new Matiere($req->fetch(PDO::FETCH_OBJ));
		$req->closeCursor();
		return $matiere;
	}
}
