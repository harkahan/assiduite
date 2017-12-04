<?php

class vue_final{

  function __construct(){}

	function afficher(){//affichage
    //header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
  		<head>
  			<meta charset="UTF-8">
  			<title>Les absences ont ete envoyees</title>
  		</head>
  		<body>
  			<div id="log">
  				<p>Les absences ont bien ete envoyees : </p>

  				<form method="post" action="index.php">
  					<fieldset>
  						<input type="submit" id="revenir" name="revenir" value="Revenir au choix de la classe"/><br>
  					</fieldset>
  				</form>
  			</div>
  		</body>
    </html>
    <?php
	}
}
?>
