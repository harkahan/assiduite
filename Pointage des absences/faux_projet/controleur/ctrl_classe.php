<?php

require_once __DIR__."/../vue/vue_choixClasse.php";
require_once __DIR__."/../modele/mdl_bd.php";

class ctrl_classe{



	private $vue;
	private $bd;
	private $getDebugMessage;





	/* role : Initialise une instance de ControleurAuthentification
	 * precondition : -
	 * postcondition : -
	 */
	public function __construct(){
		//mettre cette variable à true pour afficher les messages de DEBUG
		$this->getDebugMessage=false;

		$this->vue=new vue_choixClasse();
		$this->bd=new mdl_bd();
	}





	/* role : Affichage de la page d'accueil
	 * precondition : la valeur en entree est de type boolean
	 * postcondition : affichage de la page d'acceuil
	 */
	public function pageChoixClasse($bool){
		//affichage de la page de connection, bool=>boolean true si il y a déja eu une tentative

		if($this->getDebugMessage){
		  echo("-DEBUG: ctrl_classe: afficher page choix classe reussie");
		  echo "<br>";
		}

		$this->vue->afficher($bool);
	}





	/* role : Verifie si le couple pseudo et mot de passe est corrrect
	 * precondition : module est une chaine de caractere
	 * 								classe est une chaine de caractere
   * 								semaine est un entier compris entre 1 et 52
	 * postcondition : si l'ensemble est correct, elle relance le site avec le pseudo
	 * d'enregitsré, sinon elle redirige vers l'affichage de la page de choix des classes
	 */
	public function verifieInput($module, $classe, $semaine){



		if($this->getDebugMessage){
			echo("-DEBUG: ctrl_classe: verif module, classe et date...");
		  echo "<br>";
		}


    $results = $this->bd->verifieChoixClasses($_SESSION['urlDernierePageVisitee'], $_SESSION['HTMLDernierePageVisitee'], $module, $classe, $semaine);

		if($results[0]){


			//si tout est bon
			$_SESSION['HTMLDernierePageVisitee']=$results[1];
      $_SESSION['urlDernierePageVisitee']=$results[2];

			if($this->getDebugMessage){
				echo("-DEBUG: ctrl_classe: fin de verif -> reussite");
			  echo "<br>";
			}

			return true;//connection ok


		}else{


			if($this->getDebugMessage){
				echo("-DEBUG: ctrl_classe: fin de verif -> echec");
			  echo "<br>";
			}

			$this->pageChoixClasse(true);
			return false;//connection ko


		}



	}





}
?>
