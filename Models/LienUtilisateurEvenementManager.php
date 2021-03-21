<?php
/*
* @class Event Manager
* @author  Latour Renut Timimi
*/
class LienUtilisateurEvenementManager{
	private $bd;

	public function __construct($bd){
		$this->bd = $bd;
	}
	public function add($devoirs){
		$req = $this->bd->prepare('INSERT INTO lienutilisateurevenement(idUtilisateur, idEvenement, fait) VALUES (:idUtilisateur, :idEvenement, :fait);');
		$req->bindValue(':idUtilisateur',$devoirs->getUtId(),PDO::PARAM_INT);
		$req->bindValue(':idEvenement',$devoirs->getEventId(),PDO::PARAM_INT);
		$req->bindValue(':fait',$devoirs->getFait(),PDO::PARAM_INT);
		$req->execute();
	}
  public function getAll(){
    $ListeDev = array();
    $req = $this->bd->query('SELECT idUtilisateur, idEvenement, fait FROM lienutilisateurevenement;');
    while ($devoirs = $req->fetch(PDO::FETCH_OBJ) ) {
      $ListeDev[] = new LienUtilisateurEvenement($devoirs);
    }
    $req->closeCursor();
    return $ListeDev;
  }
  public function getAllDevoirsByIdUt($id){
    $ListeDev = array();
    $req = $this->bd->prepare('SELECT idUtilisateur, idEvenement, fait FROM lienutilisateurevenement WHERE idUtilisateur = :idUtilisateur;');
		$req->bindValue(':idUtilisateur',$id,PDO::PARAM_INT);
    while ($devoirs = $req->fetch(PDO::FETCH_OBJ) ) {
      $ListeDev[] = new LienUtilisateurEvenement($devoirs);
    }
    $req->closeCursor();
    return $ListeDev;
  }
	public function getDevoirsCheck($idUt,$idEvent){
		$req = $this->bd->prepare('SELECT idUtilisateur, idEvenement, fait FROM lienutilisateurevenement WHERE idUtilisateur = :idUtilisateur AND idEvenement = :idEvenement;');
		$req->bindValue(':idUtilisateur',$idUt,PDO::PARAM_INT);
		$req->bindValue(':idEvenement',$idEvent,PDO::PARAM_INT);
		$req->execute();
		$lien = new LienUtilisateurEvenement($req->fetch(PDO::FETCH_OBJ));
		$req->closeCursor();
		return $lien;
	}
	public function setDevoirsCheck($idUt,$idEvent,$fait){
		if(empty($this->getDevoirsCheck($idUt,$idEvent)->getEventId())){
			$dev = new LienUtilisateurEvenement(array('idUtilisateur' => $idUt,'idEvenement' => $idEvent,'fait' => $fait));
			$this->add($dev);
		}else{
			$req = $this->bd->prepare('UPDATE lienutilisateurevenement SET fait = :fait WHERE idUtilisateur = :idUtilisateur AND idEvenement = :idEvenement;');
			$req->bindValue(':idUtilisateur',$idUt,PDO::PARAM_INT);
			$req->bindValue(':idEvenement',$idEvent,PDO::PARAM_INT);
			$req->bindValue(':fait',$fait,PDO::PARAM_INT);
			$req->execute();
		}
	}
}
