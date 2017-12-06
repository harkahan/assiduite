<?php
require_once PATH_VUE."/vue_pointage.php";
require_once PATH_MODELE."/modele_gerer_bd.php";


class ControleurEtudiant{

private $vuePointage;
private $modeleBD;


function __construct(){
$this->vuePointage=new vue_pointage();
$this->modeleBD=new modele_gerer_bd();


}

function trouverEtudiant($groupe){
  $_SESSION["groupe"] = $groupe;
    $this->vuePointage->afficherVue($this->modeleBD->getEtudiant($groupe), $this->modeleBD->getGroupes());
}

function pointerEtudiant($idEtu){
  //TO DO Insertion absence
  foreach ($idEtu as $absent) {
    echo $absent;
  }
  $_SESSION["AbsenceCree"] = true;
  $_SESSION["absents"] = $idEtu;
  $this->vuePointage->afficherVue($this->modeleBD->getEtudiant($_SESSION["groupe"]), $this->modeleBD->getGroupes());






}


}
