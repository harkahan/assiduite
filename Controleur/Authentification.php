<?php

require_once "../Modèle/authentification_bd.php";

$auth = new authentification_bd();
if ($auth->verifieAuthentification($_POST["identifiant"], $_POST["pass"])) {
  header("Location: ../Vue/depot.php");
}
else{
  echo "<h1>Connexion échouée</h1>";
  $_POST = null;
}


 ?>
