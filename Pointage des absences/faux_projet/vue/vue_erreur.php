<?php
class vue_erreur{

	public function __construct(){
	}

	public function Erreur($msg){//permet l'affichage des erreurs
		header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
		<head>
			<meta charset="UTF-8">
			<title>Absdoc erreur</title>
			<link rel="stylesheet" href="vue/reset.css">
			<link rel="stylesheet" href="vue/css.css">
		</head>
		<body>
			<div class="erreur">
				Erreur: </br>
				<?php echo $msg;?><!-- afficher le message d'erreur -->
			</div>
		</body>
    </html>
    <?php
	}

}
?>
