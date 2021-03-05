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
		$req->bindValue(':idUtilisateur',$idUtilisateur->getUtId(),PDO::PARAM_INT);
		$req->bindValue(':mail',$mail->getUtMail(),PDO::PARAM_STR);
		$req->bindValue(':mdp',$mdp->getUtMdp(),PDO::PARAM_STR);
		$req->bindValue(':idClasse',$idClasse->getUtClass(),PDO::PARAM_INT);
		$req->execute();
	}

	public function getAll(){
		$ListeUt = array();
		$req = $this->bd->query('SELECT idUtilisateur, mail, mdp, u.idClasse,c.idClasse,c.promotion,c.groupe,c.anneeDiplome FROM utilisateur u INNER JOIN classe c ON u.idClasse = c.idClasse;');
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
		public function tmp(){
			//ceci est une fonction pour test git 2 secondes
		}
}
