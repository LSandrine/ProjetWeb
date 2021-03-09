<?php
/*
* @class TypeEvt Manager
* @author  Latour Renut Timimi
*/
class TypeEvenementManager{
	private $bd;

	public function __construct($bd){
		$this->bd = $bd;
	}

	public function add($type){
		$req = $this->bd->prepare('INSERT INTO typeevenement VALUES (:idTypeEvenement, :nom);');
		$req->bindValue(':idTypeEvt',$type->getTypeEvtId(),PDO::PARAM_INT);
		$req->bindValue(':nom',$type->getTypeEvtNom(),PDO::PARAM_STR);
		$req->execute();
	}

	public function getAll(){
		$ListeTypeEvt = array();
		$req = $this->bd->prepare('SELECT idTypeEvenement, nom FROM typeevenement;');
		while ($typeevenement = $req->fetch(PDO::FETCH_OBJ) ) {
			$ListeTypeEvt[] = new TypeEvenement($typeevenement);
		}
		$req->closeCursor();
		return $ListeTypeEvt;
	}

	public function getNom(){
		$response = $this->bd->prepare('SELECT distinct nom FROM typeevenement;');
		$response->execute();
		return $response->fetch();
	}

	public function getTypeEvtById($id){
		$req = $this->bd->prepare('SELECT idTypeEvenement, nom FROM typeevenement WHERE idTypeEvenement = :idTypeEvt;');
		$req->bindValue(':idTypeEvt', $id, PDO::PARAM_INT);
		$req->execute();
		$typeevenement = new TypeEvenement($req->fetch(PDO::FETCH_OBJ));
		$req->closeCursor();
		return $typeevenement;
	}
}
