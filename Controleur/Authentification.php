<?php

require_once "../Modèle/authentification_bd.php";

$auth = new authentification_bd();
if ($auth->verifieAuthentification($_POST["identifiant"], $_POST["pass"])) {
  header("Location: ../depot.html");
}
else{
  echo "<h1> too bad</h1>";
  $_POST = null;
}


 ?>
