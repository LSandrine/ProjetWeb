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
		$req = $this->bd->prepare('SELECT idUtilisateur, mail, mdp, idClasse FROM utilisateur;');
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
}
