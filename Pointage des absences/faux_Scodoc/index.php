<?php

// index.php est relancé après chaque action et relance lui même le routeur
require_once "controleur/routeur.php";

$routeur=new RouteurControleur();

$routeur->routerRequete();

?>
