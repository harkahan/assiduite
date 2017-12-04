<?php
class VueGroupe{

function afficherChoixGroupes($groupePossible) {
  // permet de choisir un groupe parmi ceux proposé

header("Content-type: text/html; charset=utf-8");

?>
<script>
var obj = { Title: "groupe", Url: "groupe.html" };
history.pushState(obj, obj.Title, obj.Url);
</script>

<html>
  <head>
    <meta charset="utf-8">
    <title>Vue Groupe</title>
    <link rel="stylesheet" href="vue/reset.css">
		<link rel="stylesheet" href="vue/css.css">
  </head>
  <body>
    <form class="" action="index.php" method="post">
      <SELECT name="groupe">
        <OPTION disabled selected> Choissisez le groupe <br>
          <?php
        foreach($groupePossible as $key=>$value2) {
          foreach ($value2 as $key => $value) {
           ?>
          <OPTION><?php print_r($value); ?> </OPTION>
          <?php
          }
        } ?>
  </SELECT>

      <input type="submit" name="soumettre" value="Envoyer">
    </form>
  </body>
</html>
<?php
}
}
?>
