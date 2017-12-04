<?php

require_once __DIR__."/../modele/bdNoterAbsence.php";
require_once __DIR__."/../vue/vue_semaine_module.php";
require_once __DIR__."/../vue/vue_afficherClasse.php";
require_once __DIR__."/../vue/vue_noterAbsence.php";
require_once __DIR__."/../vue/vue_groupe.php";

//cette classe permet de renseigner les divers champs amenant au tableau d'absence d'un groupe
// elle permet de noter les absences dans la base de données

class ControleurNoterAbsence{

	private $vue1;
	private $vue2;
	private $vue3;
	private $vue4;


	private $bd;

	public function __construct(){
		$this->vue1=new VueNoterAbsence();
		$this->vue2=new VueClasse();
		$this->vue3=new VueSemaine();
		$this->vue4=new VueGroupe();


		$this->bd=new bdNoterAbsence();
	}

  // stocke le nom et le prenom du professeur dans une variable de session
  public function recupNomPrenom($login) {
    $this->bd->recupNomPrenom($login);
  }


	// return les modules possibles
	public function modulesPossibles($login) {
		return $this->bd->modulesPossibles($login);
	}

	public function afficherSemaineModule($modulesPossibles) {
		$this->vue3->afficherVueSemaineModule($modulesPossibles);
	}

	// return les groupes possibles
	public function groupesPossibles($departement) {
		return $this->bd->groupesPossibles($departement);
	}

	public function afficherChoixGroupes($groupesPossibles){
		$this->vue4->afficherChoixGroupes($groupesPossibles);
	}
// return le tableau de pointage des absences
	public function demanderTab($groupe) {
		return $this->bd->demanderTab($groupe);
	}

	public function afficherTab($nomPossible, $absence) {
		$this->vue2->afficherTab($nomPossible, $absence);
	}
// retourne les absences notés du groupe
	public function demanderAbsence($groupe){
		return $this->bd->demanderAbsence($groupe);
	}
// note une absence ou plusieurs
	public function checkAbsence($post, $login){
 		$this->bd->checkAbsence($post,$login);
	}

}
?>
