<?php

require_once "controleur/ctrl_routeur.php";

$routeur = new ctrl_routeur();
$routeur->routerRequete();

//cette page est vers laquelle l'utilisateur est systématiquement renvoyé
//tout ce qu'elle fait n'est que de lancer le routeur

?>
