<?php
require_once PATH_VUE."/vue_authentification.php";
require_once PATH_VUE."/vue_pointage.php";
require_once PATH_MODELE."/modele_authentification_bd.php";


class ControleurAuthentification{

private $vueAuthentification;
private $vuePointage;
private $modeleAuthentification;
private $modeleBD;


function __construct(){
$this->vueAuthentification=new vue_authentification();
$this->modeleAuthentification=new modele_authentification_bd();
$this->vuePointage=new vue_pointage();
$this->modeleBD=new modele_gerer_bd();
}

function accueil(){
$this->vueAuthentification->afficherVue();
}

function verifieConnexion($pseudo, $password){
  if ($this->modeleAuthentification->verifieAuthentification($pseudo, $password)) {
    $_SESSION["login"] = $pseudo;
    $this->vuePointage->afficherVue(null, $this->modeleBD->getGroupes());
  }
  else{
    $this->vueAuthentification->afficherVue();
  }
}


}
