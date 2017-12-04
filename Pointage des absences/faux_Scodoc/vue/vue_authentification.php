<?php
class VueAuthentification{

// permet de s'authentifier
function afficherVueAuthentification() {
?>

<script>
var obj = { Title: "authentification", Url: "authentification.html" };
history.pushState(obj, obj.Title, obj.Url);
</script>

  <body>
    <form class="" action="index.php" method="post">
      Login: <input type="text" name="login" value="" required><br>
      Mdp: <input type="password" name="mdp" value="" required><br>
    <input type="submit" name="soumettre" value="Envoyer">
    </form>
  </body>
</html>
<?php
}
// permet de choisir le departement parmi ceux possibles
function afficherDemandeDepartement($departementPossible) { // Besoin de $departementpossible pour connaître les différents départements

header("Content-type: text/html; charset=utf-8");
?>

<script>
var obj = { Title: "departements", Url: "vueDepartement.html" };
history.pushState(obj, obj.Title, obj.Url);
</script>

<html>
  <head>
    <meta charset="utf-8">
    <title>Vue Departement</title>
    <link rel="stylesheet" href="vue/reset.css">
		<link rel="stylesheet" href="vue/css.css">
  </head>
  <body>
    <form class="" action="index.php" method="post">
    <SELECT name="departement">
      <OPTION disabled selected> Choissisez votre département <br>
      <?php
      // On peut choisir un département parmi ceux proposés
      foreach ($departementPossible as $value2) {
        foreach ($value2 as $key => $value)  { ?>
      <OPTION><? echo $value; ?> </OPTION>
      <?php }} ?>
</SELECT>
    <input type="submit" name="soumettre" value="Envoyer">
    </form>
  </body>
</html>
<?php
  }
}
?>
