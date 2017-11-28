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

  /*  if (isset($_POST["pseudo"])) {
      $this->ctrlAuthentification->verifiePseudo($_POST["pseudo"]);
     }
    else if (isset()) {
     $this->ctrlNouveauMessage->nouveauMessage($_POST["message"]);
   }
    else {*/$this->ctrlAuthentification->accueil();//}
 }


 }




?>
