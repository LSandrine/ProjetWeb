<?php
/*
* @class User
* @author  Latour Renut Timimi
* class + objt (ajout des listes event de l'utilisateur)
* travaille par fonct (agile like)
*/
class UtilisateurManager{
	private $bd;

	public function __construct($bd){
		$this->bd = $bd;
	}

	public function add($utilisateur){
		$req = $this->bd->prepare('INSERT INTO utilisateur VALUES (:idUtilisateur, :mail, :mdp, :idClasse);');
		$req->bindValue(':idUtilisateur',$utilisateur->getUtId(),PDO::PARAM_INT);
		$req->bindValue(':mail',$utilisateur->getUtMail(),PDO::PARAM_STR);
		$req->bindValue(':mdp',$utilisateur->getUtMdp(),PDO::PARAM_STR);
		$req->bindValue(':idClasse',$utilisateur->getUtClassId(),PDO::PARAM_INT);
		$req->execute();
	}

	public function getAll(){
		$ListeUt = array();
		$req = $this->bd->query('SELECT idUtilisateur, mail, mdp, idClasse FROM utilisateur;');
		while ($utilisateur = $req->fetch(PDO::FETCH_OBJ) ) {
			$ListeUt[] = new Utilisateur($utilisateur);
		}
		$req->closeCursor();
		return $ListeUt;
	}

	public function getUtilisateurById($id){
		$req = $this->bd->prepare('SELECT idUtilisateur, mail, mdp, idClasse FROM utilisateur WHERE idUtilisateur = :idUtilisateur;');
		$req->bindValue(':idUtilisateur', $id, PDO::PARAM_INT);
		$req->execute();
		$utilisateur = new Utilisateur($req->fetch(PDO::FETCH_OBJ));
		$req->closeCursor();
		return $utilisateur;
	}
	public function getUtAvecMailMdp($email,$mdp){
			$req = $this->bd->prepare('SELECT idUtilisateur, mail, mdp, idClasse FROM utilisateur WHERE mail = :mail AND mdp = :mdp;');
			$req->bindValue(':mail', $email, PDO::PARAM_STR);
			$req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
			$req->execute();
			$utilisateur = new Utilisateur($req->fetch(PDO::FETCH_OBJ));
			$req->closeCursor();
			return $utilisateur;
	}

	public function existeUtilisateur($email)
	{
		$req = $this->bd->prepare('SELECT mail FROM utilisateur WHERE mail = :mail ');
    $req->bindValue(':mail', $email, PDO::PARAM_STR);
		$req->execute();
		return  $req->rowCount();
	}
	public function getLastId(){
		$req = $this->bd->prepare('SELECT max(idUtilisateur) as maxId FROM utilisateur;');
		$req->execute();
		$reqUser = $req -> fetch(PDO::FETCH_ASSOC);
		return $reqUser['maxId'];
	}

}
