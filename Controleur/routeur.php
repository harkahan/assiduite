<?php

require_once 'controleur_authentification.php';
require_once 'controleur_etudiant.php';

class Routeur {

  private $ctrlAuthentification;
  private $ctrlEtudiant;


  public function __construct() {
    $this->ctrlAuthentification= new ControleurAuthentification();
    $this->ctrlEtudiant= new ControleurEtudiant();
  }

  // Traite une requête entrante
  public function routerRequete() {
    if (isset($_POST["identifiant"]) && isset($_POST["password"])) {
      $this->ctrlAuthentification->verifieConnexion($_POST["identifiant"], $_POST["password"]);
     }
    elseif (isset($_POST["groupe"])) {
       $this->ctrlEtudiant->trouverEtudiant($_POST["groupe"]);
      }
    elseif (isset($_POST["idAbsent"])) {
       $this->ctrlEtudiant->pointerEtudiant($_POST["idAbsent"]);
      }
    else {$this->ctrlAuthentification->accueil();}
 }


 }




?>
