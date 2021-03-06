<?php
/*
* @class User
* @author  Latour Renut Timimi
*/

class Utilisateur{
	private $isOK;
	private $idUtilisateur;
	private $mail;
	private $mdp;
	private $idClasse;
	private $ListRole;
	private $classeUt;
	private $ListDevoirs;
	private $delegue;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
			$this->isOK = true;
		}else{
			$this->isOK = false;
		}
	}
	public function affecte($donnee){
		foreach($donnee as $attribut => $valeur){
			switch($attribut){
				case 'idUtilisateur':
					$this->setUtId($valeur);
					break;
				case 'mail':
					$this->setUtMail($valeur);
					break;
				case 'mdp':
					$this->setUtmdp($valeur);
					break;
				case 'idClasse':
					$this->setUtClassId($valeur);
					break;
			}
			$db = Database::getInstance();
			$managerclasse = new ClasseManager($db);
			$managerdevoirs = new LienUtilisateurEvenementManager($db);
			$managerroll = new RoleManager($db);
			$this->classeUt = $managerclasse->getClasseById($this->getUtClassId());
			$this->ListDevoirs = $managerdevoirs->getAllDevoirsByIdUt($this->getUtClassId());
			$this->ListRole = $managerroll->getRoleByUserId($this->getUtId());
			$this->setUtDelegue();
		}
  }
	public function isOK(){
		return $this->isOK;
	}
	public function setUtId($valeur){
		$this->idUtilisateur = $valeur;
	}
	public function setUtMail($valeur){
		$this->mail = $valeur;
	}
	public function setUtmdp($valeur){
		$this->mdp = $valeur;
	}
	public function setUtClassId($valeur){
		$this->idClasse = $valeur;
	}
	public function setUtClasse($valeur){
		$this->classeUt = $valeur;
	}
	public function setUtDelegue(){
		$this->delegue = false;
		foreach($this->ListRole as $role){
			if($role->getRoleDelegue()){
				$this->delegue = true;
			}
		}
	}
	public function getUtId(){
		return $this->idUtilisateur;
	}
	public function getUtMail(){
		return $this->mail;
	}
	public function getUtmdp(){
		return $this->mdp;
	}
	public function getUtClassId(){
		return $this->idClasse;
	}
	public function getUtClasse(){
		return $this->classeUt;
	}
	public function getListDevoirs(){
		return $this->ListDevoirs;
	}
	public function getListRole(){
		return $this->ListRole;
	}
	public function getUtDelegue(){
		return $this->delegue;
	}
}
