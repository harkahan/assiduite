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
    $this->vuePointage->afficherVue($this->modeleBD->getEtudiant($groupe));
}


}
