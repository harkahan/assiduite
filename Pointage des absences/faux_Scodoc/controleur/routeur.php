<?php
session_start();
require_once 'controleurAuthentification.php';
require_once __DIR__."/../vue/vueErreur.php";
require_once 'controleurNoterAbsence.php';

//cette classe est la colonne vertebrale du programme
//elle lance le bon controleur ou la bonne vue en fonction du contexte
//le contexte est défini par les variables de session qui sont initialisé au fur et à mesure de la navigation de l'utilisateur

class RouteurControleur {

	private $ctrlAuthentification;
	private $vueErreur;
	private $ctrlNoterAbsence;

	public function __construct() {
		try{
			// initialisation des vues
			$this->vueErreur=new VueErreur();
			$this->ctrlAuthentification = new ControleurAuthentification();
			$this->ctrlNoterAbsence = new ControleurNoterAbsence();

		}catch(Exception $e){
			// les vues n'existent pas, on interromp le logiciel
			$this->vueErreur->Erreur($e);
			session_destroy();
			exit;
		}
	}

	// Traite une requête entrante
	public function routerRequete() {
		try{

			if (array_key_exists("login",$_POST) && array_key_exists("mdp",$_POST)) {
				// le client se connecte, il envoie son login et son mot de passe
				if($this->ctrlAuthentification->verifieConnexion($_POST["login"],$_POST["mdp"])){
					// l' association login / mot de passe est valide
					$_SESSION['login'] = $_POST['login'];
					// envoie les département possible à la page d'authentification
					$this->ctrlAuthentification->demande_departement($_SESSION['login']);
				}else{
					echo "Echec de validation des identifiants ";
					exit();
				}

				}

				// le departement a été choisie
				elseif (array_key_exists("departement",$_POST)) {
					$_SESSION['departement']=$_POST['departement'];
					$_SESSION['nomPrenom']=$this->ctrlNoterAbsence->recupNomPrenom($_SESSION['login']);
					// affichage de la vue semaine / module
					$modulesPossibles=$this->ctrlNoterAbsence->modulesPossibles($_SESSION['login']);
					$this->ctrlNoterAbsence->afficherSemaineModule($modulesPossibles);

				}
				// la semaine a été choisie
				elseif (array_key_exists("semaine",$_POST) && array_key_exists("module",$_POST)) {
					$_SESSION['semaine']=$_POST['semaine'];
					$_SESSION['module']=$_POST['module'];
					// choix du groupe
					$groupesPossibles=$this->ctrlNoterAbsence->groupesPossibles($_SESSION['departement']);
					$this->ctrlNoterAbsence->afficherChoixGroupes($groupesPossibles);

				}
				// le groupe a été choisi
				elseif (array_key_exists("groupe",$_POST)) {
					$_SESSION['groupe']=$_POST['groupe'];
					// on recupere le groupe ciblé par les différents choix
					$_SESSION['tab']=$this->ctrlNoterAbsence->demanderTab($_SESSION['groupe']);
					$_SESSION['absence']=$this->ctrlNoterAbsence->demanderAbsence($_SESSION['groupe']);
					//print_r ($tab); // format : [nom] => [le_nom], [prenom] => [le_prenom]

					// affiche le tableau de pointage des absences
					$this->ctrlNoterAbsence->afficherTab($_SESSION['tab'], $_SESSION['absence']);
				}

				elseif (array_key_exists("tab",$_SESSION)) {
					// on recupère les absences du groupes
					$post=array();
					foreach($_POST as $key => $value) {
						//echo "La valeur a ajouter au post ".$key;
						array_push($post, $key);
					}
					// si une absence a été indiquée
					if (!empty($post)){
						foreach ($post as $value2) {
							$this->ctrlNoterAbsence->checkAbsence($value2, $_SESSION['login']);
						}

					}
					// on ré-affiche le tableau des absences
					$_SESSION['absence']=$this->ctrlNoterAbsence->demanderAbsence($_SESSION['groupe']);
					$this->ctrlNoterAbsence->afficherTab($_SESSION['tab'], $_SESSION['absence']);
				}



			else {
				// il n'y a pas d'information recue, on lance la page de connexion
				$this->ctrlAuthentification->pageConnexion();

			}

			} catch (Exception $e) {
				echo "exception : routeur";

		    }

 }
}
?>
