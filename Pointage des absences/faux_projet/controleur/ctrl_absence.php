<?php

require_once __DIR__."/../vue/vue_choixAbsences.php";
require_once __DIR__."/../modele/mdl_bd.php";

class ctrl_absence{



	private $vue;
	private $bd;





	/* role : Initialise une instance de ControleurAuthentification
	 * precondition : -
	 * postcondition : -
	 */
	public function __construct(){

		$this->vue=new vue_choixAbsences();
		$this->bd=new mdl_bd();

	}





	/* role : Affichage de la page d'accueil
	 * precondition : la valeur en entree est de type boolean
	 * postcondition : affichage de la page d'acceuil
	 */
	public function pageChoixAbsence($bool){
		//affichage de la page de connection, bool=>boolean true si il y a déja eu une tentative


		if($this->getDebugMessage){
			echo("-DEBUG: ctrl_absence: afficher page choix absence reussie");
			echo "<br>";
		}

		$listeNomEleve = $this->bd->getListeEleve($_SESSION['HTMLDernierePageVisitee']);
		$this->vue->afficher($bool, $listeNomEleve);


	}





	/* role : Verifie si le couple pseudo et mot de passe est corrrect
	 * precondition : eleves est un tableau d'absence en demi journee
	 * postcondition : si l'ensemble est correct, elle relance le site avec le pseudo
	 * d'enregitsré, sinon elle redirige vers l'affichage de la page de la selection des absences
	 */
	public function verifieInput($eleves, $nbr_absents){



    $results = $this->bd->verifieChoixAbsences($_SESSION['HTMLDernierePageVisitee'], $eleves);
		$nbr_marques_absent = 0;
		for($i = 0; $i<array_count_values($eleves); $i++){
			if($eleves[$i])$nbr_marques_absent++;
		}

		if($results[0]&&$nbr_absents==$nbr_marques_absent){


			//si tout est bon
			$_SESSION['eleves']=$eleves;
      $_SESSION['urlDernierePageVisitee']=$results[1];
			return true;//connection ok


		}else{


			$this->pageChoixAbsence(true);
			return false;//connection ko


		}



	}





}
?>
