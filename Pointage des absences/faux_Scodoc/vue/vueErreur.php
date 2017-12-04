<?php
class VueErreur{

	public function __construct(){
	}

	public function Erreur($msg){//permet l'affichage des erreurs
		header("Content-type: text/html; charset=utf-8");
    ?>
    <script>
	var obj = { Title: "erreur", Url: "erreur.html" };
	history.pushState(obj, obj.Title, obj.Url);
	</script>

    <html>
		<head>
			<meta charset="UTF-8">
			<title>erreur</title>
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
