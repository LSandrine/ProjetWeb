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

	public function add($classe){
		$req = $this->bd->prepare('INSERT INTO classe VALUES (:idClasse, :promotion, :groupe, :anneeDiplome);');
		$req->bindValue(':idClasse',$classe->getClassId(),PDO::PARAM_INT);
		$req->bindValue(':promotion',$classe->getClassPromo(),PDO::PARAM_STR);
		$req->bindValue(':groupe',$classe->getClassGrp(),PDO::PARAM_STR);
		$req->bindValue(':anneeDiplome',$classe->getClassDip(),PDO::PARAM_INT);
		$req->execute();
	}

	public function getAll(){
		$ListeClass = array();
		$req = $this->bd->query('SELECT idClasse, promotion, groupe, anneeDiplome FROM classe;');
		while ($classe = $req->fetch(PDO::FETCH_OBJ) ) {
			$ListeClass[] = new Classe($classe);
		}
		$req->closeCursor();
		return $ListeClass;
	}

	public function getClasseById($id){
		$req = $this->bd->prepare('SELECT idClasse, promotion, groupe, anneeDiplome FROM classe WHERE idClasse = :idClasse;');
		$req->bindValue(':idClasse', $id, PDO::PARAM_INT);
		$req->execute();
		$classe = new Classe($req->fetch(PDO::FETCH_OBJ));
		return $classe;
	}
	public function getPromotion(){
		$ListPromo = array();
		$response = $this->bd->query('SELECT distinct promotion FROM classe;');
		$response->execute();
		while ($prom = $response->fetch() ) {
			$ListPromo[] = $prom;
		}
		return $ListPromo;
	}
	public function getGroupe(){
		$ListGrp = array();
		$response = $this->bd->query('SELECT distinct groupe FROM classe;');
		$response->execute();
		while ($grp = $response->fetch() ) {
			$ListGrp[] = $grp;
		}
		return $ListGrp;
	}
	public function getClasseByPromoGrp($promo,$grp){
		$req = $this->bd->prepare('SELECT idClasse, promotion, groupe, anneeDiplome FROM classe WHERE promotion = :promotion AND groupe = :groupe;');
		$req->bindValue(':promotion', $promo, PDO::PARAM_STR);
		$req->bindValue(':groupe', $grp, PDO::PARAM_STR);
		$req->execute();
		$classe = new Classe($req->fetch(PDO::FETCH_OBJ));
		return $classe;
	}
}
