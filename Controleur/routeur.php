<?php

require_once 'controleur_authentification.php';

class Routeur {

  private $ctrlAuthentification;


  public function __construct() {
    $this->ctrlAuthentification= new ControleurAuthentification();
  }

  // Traite une requête entrante
  public function routerRequete() {

    if (isset($_POST["identifiant"]) && isset($_POST["password"])) {
      $this->ctrlAuthentification->verifieConnexion($_POST["identifiant"], $_POST["password"]);
     }
    else {$this->ctrlAuthentification->accueil();}
 }


 }




?>
