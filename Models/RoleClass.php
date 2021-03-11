<?php
/*
* @class Role
* @author  Latour Renut Timimi
*/
class Role{
	private $idRole;
	private $nomRole;
	private $delegue;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($donnee){
		foreach($donnee as $attribut => $valeur){
			switch($attribut){
				case 'idRole':
					$this->setRoleId($valeur);
					break;
				case 'nomRole':
					$this->setRoleNom($valeur);
					break;
			}
			if($this->idRole == 2){
				$this->delegue = true;
			}else{
				$this->delegue = false;
			}
		}
  }

	public function setRoleId($valeur){
		$this->idRole = $valeur;
	}
	public function setRoleNom($valeur){
		$this->nomRole = $valeur;
	}
	public function setRoleDelegue($valeur){
		$this->delegue = $valeur;
	}
	public function getRoleId(){
		return $this->idRole;
	}
	public function getRoleNom(){
		return $this->nomRole;
	}
	public function getRoleDelegue(){
		return $this->delegue;
	}
}
