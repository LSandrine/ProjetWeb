<?php
/*
* @class Classe Manager
* @author  Latour Renut Timimi
*/
class RoleManager{
	private $bd;

	public function __construct($bd){
		$this->bd = $bd;
	}
  public function add($role){
		$req = $this->bd->prepare('INSERT INTO role VALUES (:idRole, :nomRole);');
		$req->bindValue(':idRole',$role->getRoleId(),PDO::PARAM_INT);
		$req->bindValue(':nomRole',$role->getRoleNom(),PDO::PARAM_STR);
		$req->execute();
	}
	public function getAll(){
		$ListeR = array();
		$req = $this->bd->query('SELECT role.idRole, nomRole,idUtilisateur FROM role INNER JOIN lienutilisateurrole ON lienutilisateurrole.idRole = role.idRole;');
		while ($r = $req->fetch(PDO::FETCH_OBJ) ) {
			$ListeR[] = new Role($r);
		}
		$req->closeCursor();
		return $ListeR;
	}

  public function getRoleById($id){
		$req = $this->bd->prepare('SELECT idRole, nomRole FROM role WHERE idRole = :idRole;');
		$req->bindValue(':idRole', $id, PDO::PARAM_INT);
		$req->execute();
		$classe = new Classe($req->fetch(PDO::FETCH_OBJ));
		return $classe;
	}
  public function getRoleByUserId($idU){
		$ListeR = array();
		$req = $this->bd->prepare('SELECT role.idRole,nomRole,idUtilisateur FROM role INNER JOIN lienutilisateurrole ON lienutilisateurrole.idRole = role.idRole WHERE idUtilisateur = :idUtilisateur;');
		$req->bindValue(':idUtilisateur', $idU, PDO::PARAM_INT);
		$req->execute();
    while ($r = $req->fetch(PDO::FETCH_OBJ) ) {
			$ListeR[] = new Role($r);
		}
		return $ListeR;
	}
}
