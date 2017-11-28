<?php

require_once 'controleurAuthentification.php';
require_once 'controleurNouveauMessage.php';


class Routeur {

  private $ctrlAuthentification;
  private $ctrlNouveauMessage;
  private $modeleBD;




  public function __construct() {
    $this->ctrlAuthentification= new ControleurAuthentification();
    $this->ctrlNouveauMessage= new ControleurNouveauMessage();
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
