<?php


//cette classe est la colonne vertebrale du programme
//elle lance le bon controleur ou la bonne vue en fonction du contexte
//le contexte est défini par les variables de session qui sont initialisé au fur et à mesure de la navigation de l'utilisateur

session_start();

require_once __DIR__.'/ctrl_absence.php';
require_once __DIR__.'/ctrl_authentification.php';
require_once __DIR__.'/ctrl_classe.php';
require_once __DIR__.'/../vue/vue_erreur.php';
require_once __DIR__.'/../vue/vue_final.php';


class ctrl_routeur {



	private $ctrlAuthentification;
	private $ctrlAbsence;
	private $ctrlClasse;
	private $vueErreur;
	private $vueFinal;
	private $getDebugMessage;





	/* role : Initialise une instance de routeur
	 * precondition : -
	 * postcondition : la session est detruite avec une redirection vers la page d'erreur
	 * s'il y a une exception a l'initialisation, rien sinon
	 */
	public function __construct() {

		try{

			//mettre cette variable à true pour afficher les messages de DEBUG
			$this->getDebugMessage=false;

			if($this->getDebugMessage){
				echo('DEBUG: ctrl_routeur: nouveau routeur');
				echo '<br>';
			}

			$this->vueErreur=new vue_erreur();
			$this->vueFinal=new vue_final();
			$this->ctrlAuthentification = new ctrl_authentification();

		}catch(Exception $e){
			$this->vueErreur->Erreur($e);
			session_destroy();
			exit;
		}

	}





	/* role : Traite une requête
	 * precondition : -
	 * postcondition : oriente vers un nouveau controleur en fonction de la requete
	 */
	public function routerRequete() {



		try{


//------------------------------------------------------------------------------
			if (isset($_POST['login']) && isset($_POST['password'])) {
				//l'utilisateur a rentre son identifiant et son mot de passe


				if($this->getDebugMessage){
				  echo('DEBUG: ctrl_routeur: appel de la verification de mot de passe');
				  echo '<br>';
				}

				if($this->ctrlAuthentification->verifieConnection($_POST['login'],$_POST['password'])){
					//si le couple identifiant et mot de passe est correct et verifie

					if($this->getDebugMessage){
					  echo('DEBUG: ctrl_routeur: login et password sont corrects');
					  echo '<br>';
					}

					if(!headers_sent()){
						header('Location: index.php');//empeche le bug d'actualisation de la page
					}

					$_SESSION['Login']=$_POST['login'];
					$_POST=null;//vide le POST pour éviter tout problème
					$this->ctrlClasse = new ctrl_classe();
					$this->ctrlClasse->pageChoixClasse(false);
					exit();
				}

//------------------------------------------------------------------------------
			}else if(isset($_SESSION['Login'])
					&& isset($_POST['Classe'])
					&& isset($_POST['Module'])
					&& isset($_POST['Jour'])
					&& isset($_POST['Mois'])
					&& isset($_POST['Annee'])){
				//l'utilisateur a rentre le module, classe et semaine


				if($this->getDebugMessage){
          echo('DEBUG: ctrl_routeur: appel de la verification de classe module date');
				  echo '<br>';
				}

				$this->ctrlClasse = new ctrl_classe();
				if(!headers_sent()){
					header('Location: index.php');//empeche le bug d'actualisation de la page
				}

				//recupere le numero de la semaine de la date rentree
				$Date = $_POST['Annee'].'-'.$_POST['Mois'].'-'.$_POST['Jour'];
				$Semaine = date('W', strtotime($Date));

				if($this->ctrlClasse->verifieInput($_POST['Classe'],$_POST['Module'],$Semaine)){
					$_SESSION['Classe']=$_POST['Classe'];
					$_SESSION['Module']=$_POST['Module'];
					$_SESSION['Date']=$Date;
					$_POST=null;//vide le POST pour éviter tout problème
					$this->ctrlAbsence = new ctrl_absence();
					$this->ctrlAbsence->pageChoixAbsence(false);
					exit();
				}

//------------------------------------------------------------------------------
			}else if(isset($_SESSION['Login'])
					&& isset($_SESSION['Classe'])
					&& isset($_SESSION['Module'])
					&& isset($_SESSION['Date'])
					&& isset($_POST['eleves'])){
				//l'utilisateur a rentre les absences


				if($this->getDebugMessage){
          echo('DEBUG: ctrl_routeur: appel de la verification des absences');
				  echo '<br>';
				}

				$this->ctrlAbsence = new ctrl_absence();
				if(!headers_sent()){
					header('Location: index.php');//empeche le bug d'actualisation de la page
				}

				if($this->ctrlAbsence->verifieInput($_POST['eleves'])){
					$_SESSION['eleves']=$_POST['eleves'];
					$_POST=null;//vide le POST pour éviter tout problème
					$this->vueFinal->afficher();
					exit();
				}

//------------------------------------------------------------------------------
			}else if(isset($_SESSION['Login'])
						&& isset($_SESSION['Classe'])
						&& isset($_SESSION['Module'])
						&& isset($_SESSION['Date'])
						&& isset($_SESSION['eleves'])){
					//l'utilisateur a rentre les absences


					if($this->getDebugMessage){
						echo('DEBUG: ctrl_routeur: appel de quand tout a déjà été validé');
						echo '<br>';
					}

					if(!headers_sent()){
						header('Location: index.php');//empeche le bug d'actualisation de la page
					}

					$_SESSION['Classe']=null;
					$_SESSION['Module']=null;
					$_SESSION['semaine']=null;
					$_SESSION['eleves']=null;
					$this->ctrlClasse = new ctrl_classe();
					$this->ctrlClasse->pageChoixClasse();
					exit();

//------------------------------------------------------------------------------
			}else{
				//si rien n'a ete initialise


				if($this->getDebugMessage){
					echo("DEBUG: ctrl_routeur: rien n'a ete rentre");
				  echo '<br>';
				}

				//redirection vers la page d'authentification
				$this->ctrlAuthentification->accueil(false);
				exit();


			}


			if($this->getDebugMessage){
				echo('DEBUG: ctrl_routeur: fin de router requete');
				echo '<br>';
			}



		}catch(Exception $e){
			//s'il y a une exception
			//redirection vers la page d'erreur
			$this->vueErreur->Erreur($e);
			session_destroy();
			exit;
		}



	}





}
?>
