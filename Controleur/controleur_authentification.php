<?php
require_once PATH_VUE."/vue_authentification.php";
require_once PATH_MODELE."/modele_authentification_bd.php";


class ControleurAuthentification{

private $vueAuthentification;
private $modeleAuthentification;


function __construct(){
$this->vueAuthentification=new vue_authentification();
$this->modeleAuthentification=new modele_authentification_bd();


}

function accueil(){
$this->vueAuthentification->afficherVue();
}

function verifieConnexion($pseudo, $password){
  if ($this->modeleAuthentification->verifieAuthentification($pseudo, $password)) {
    echo "ok";
  }
  else{
    $this->vueAuthentification->afficherVue();
  }
}


}
