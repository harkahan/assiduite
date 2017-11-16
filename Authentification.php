<?php

require_once "../Modèle/authentification_bd.php"

$auth = new authentification_bd();
echo "HEyy";
if ($auth->verifieAuthentification($_POST["identifiant"], $_POST["pass"])) {
  header("Location: ../depot.php");
}
else{
  alert("Mauvais Identifiant ou Mot de Passe");
  $_POST = null;
}


 ?>
