<?php
//On créer une classe
class vue_authentification{

  function __construct(){
	}
	//Fonction pour pouvoir afficher cette vue dans les controleurs
	function afficher($fail){//affichage
    //header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
		<head>
			<meta charset="UTF-8">
			<title>Authentification</title>
			<link rel="stylesheet" href="vue/css/login.css">
		</head>
		<body>

			<h2>Bienvenue sur l'application de pointage de l'IUT de Nantes</h2>
			<img src='https://yt3.ggpht.com/-sKywvcq9lAM/AAAAAAAAAAI/AAAAAAAAAAA/vzUWB0cr9Nc/s900-c-k-no-mo-rj-c0xffffff/photo.jpg' style="width:80px;height:100px" alt='Logo IUT'>


			<div id="log">
				<p>Entrer vos identifiants : </p>
				<?php
				//Regarde s'il y a eu une connection
					if(gettype($fail)== "boolean"){
						if($fail){//si il y a déjà eu une connection on affiche le message:
							?><p id="erreur"> Mot de passe ou login incorrect </p><?php
						}
					}else{
						throw new Exception("Problème avec le log");
					}
				?>
				<form method="post" action="index.php">
					<fieldset>
						<div class="titre_input">Login :</div> <input type="text" id="login" name="login" placeholder="login" autofocus required/><br>
						<div class="titre_input">Mot de passe :</div> <input type="password" id="password" name="password" placeholder="Mot de passe" required/><br>
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
