<?php

require_once __DIR__."/../vue/vue_authentification.php";
require_once __DIR__."/../modele/mdl_bd.php";

class ctrl_authentification{



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

		$this->vue=new vue_authentification();
		$this->bd=new mdl_bd();

	}





	/* role : Affichage de la page d'accueil
	 * precondition : la valeur en entree est de type boolean
	 * postcondition : affichage de la page d'acceuil
	 */
	public function accueil($bool){
		//affichage de la page de connection, bool=>boolean true si il y a déja eu une tentative

		if($this->getDebugMessage){
			echo("-DEBUG: ctrl_authentification: afficher accueil reussie\n");
		  echo "<br>";
		}

		$this->vue->afficher($bool);

	}





	/* role : Verifie si le couple pseudo et mot de passe est corrrect
	 * precondition : pseudo est une chaine de caractere
	 * 								mdp est une chaine de caractere
	 * postcondition : si le couple est correct, elle relance le site avec le pseudo
	 * d'enregitsré, sinon elle redirige vers l'affichage de la page d'acceuil
	 */
	public function verifieConnection($pseudo, $mdp){



		if($this->getDebugMessage){
			echo("-DEBUG: ctrl_authentification: verif du mot de passe...\n");
		  echo "<br>";
		}

    $results = $this->bd->verifieMdp($pseudo, $mdp);

		if($results[0]){
			//si tout est bon


			if($this->getDebugMessage){
				echo("-DEBUG: ctrl_authentification: YES!\n");
			  echo "<br>";
			}

      $_SESSION['HTMLDernierePageVisitee']=$results[1];
			$_SESSION['urlDernierePageVisitee']=$results[2];
			return true;//connection ok


		}else{


			if($this->getDebugMessage){
				echo("-DEBUG: ctrl_authentification: nop :D\n");
				echo "<br>";
			}

			$this->accueil(true);
			return false;//connection ko


		}



	}





}
?>
