<?php

class vue_choixClasse{

  function __construct(){}

	function afficher($fail){//affichage
    //header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
  		<head>
  			<meta charset="UTF-8">
  			<title>Choix de la classe</title>
  		</head>
  		<body>
  			<div id="log">
  				<p>Entrer les informations liees au cours : </p>
  				<?php
  					if(gettype($fail)== "boolean"){
  						if($fail){//si il y a déjà eu une connection on affiche le message:
  							?><p id="erreur"> module, classe, semaine incorrect </p><?php
  						}
  					}else{
  						throw new Exception("Problème avec le log");
  					}
  				?>
  				<form method="post" action="index.php">
  					<fieldset>
  						Module : <input type="text" id="Module" name="Module" placeholder="Module" autofocus required/><br>
  						Classe : <input type="text" id="Classe" name="Classe" placeholder="Classe" required/><br>
              Date : <input type="text" id="Jour" name="Jour" placeholder="Jour" required/><br>
              <input type="text" id="Mois" name="Mois" placeholder="Mois" required/><br>
              <input type="text" id="Annee" name="Annee" placeholder="Annee" required/><br>

              <input type="radio" id="demijournee" name="demijournee" value="matin" checked required> Matin<br>
              <input type="radio" id="demijournee" name="demijournee" value="apresMidi" required> Apres midi<br>
  						<input type="submit" id="connection" name="soumettre" value="Connection"/><br>

  					</fieldset>
  				</form>
  			</div>
  		</body>
    </html>
    <?php
	}
}
?>
