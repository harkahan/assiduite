<?php

class vue_choixAbsences{

  function __construct(){}
  //Fonction pour pouvoir afficher cette vue dans les controleurs
	function afficher($fail, $listeNomEleve){//affichage
    //header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
  		<head>
  			<meta charset="UTF-8">
  			<title>Choix des absences</title>
  		</head>
  		<body>
  			<div id="log">
  				<p> Selectionner les absences : </p>
  				<?php
  					if(gettype($fail)== "boolean"){
  						if($fail){//si il y a déjà eu une connection on affiche le message:
  							?><p id="erreur"> Erreur au niveau du nombre d'absence </p><?php
  						}
  					}else{
  						throw new Exception("Probleme avec le log");
  					}
  				?>
  				<form method="post" action="index.php">
  					<fieldset>
              <?php
                foreach ($listeNomEleve as $name){
                  ?>
      						Eleves : <input type="text" id="Eleves" name="Eleves" placeholder="Eleves" autofocus required/><br>
      						<input type="submit" id="connection" name="soumettre" value="Connection"/><br>
                  <?php
                }
                ?>
  					</fieldset>
  				</form>
  			</div>
  		</body>
    </html>
    <?php
	}
}
?>
