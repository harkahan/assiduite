<?php

require_once __DIR__."/../vue/vue_authentification.php";
require_once __DIR__."/../modele/bdAuthentification.php";

//cette classe permet l'authentification et le choix du département par l'utilisateur

class ControleurAuthentification{

	private $vue;
	private $bd;

	public function __construct(){
		$this->vue=new VueAuthentification();
		$this->bd=new BdAuthentification();
	}

	public function pageConnexion(){
		// affichage de la page de connection, bool=>boolean true si il y a déja eu une tentative
		$this->vue->afficherVueAuthentification();
	}

	public function demande_departement($login){
		//affichage de la page principale, bool=>boolean true si il y a déja eu une tentative
		$departementPossible=$this->bd->departementPossible($login);
		$this->vue->afficherDemandeDepartement($departementPossible);
	}

	//verifie la validitée du login et du mot de passe
	public function verifieConnexion($login, $mdp){
		if($this->bd->verifieConnexion($login, $mdp)){
			//si tout est bon
			$_SESSION['login']=$login;
			return true;//connection ok
		}else{
			$this->pageConnexion();
			return false;//connection ko
		}
	}

}
?>
