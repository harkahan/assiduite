<?php
class VueSemaine{
// permet de choisir une semaine. et un module
function afficherVueSemaineModule($modules) {

header("Content-type: text/html; charset=utf-8");

?>

<script>
var obj = { Title: "semaine", Url: "semaine_module.html" };
history.pushState(obj, obj.Title, obj.Url);
</script>


<html>
  <head>
    <meta charset="utf-8">
    <title>Vue Semaine</title>
    <link rel="stylesheet" href="vue/reset.css">
		<link rel="stylesheet" href="vue/css.css">
  </head>
  <body>
  <form class="" action="index.php" method="post">
      <input type="radio" name="semaine" value="1" checked> Semaine 1<br>
      <input type="radio" name="semaine" value="2" checked> Semaine 2<br>
      <input type="radio" name="semaine" value="3" checked> Semaine 3<br>
      <input type="radio" name="semaine" value="4" checked> Semaine 4<br>
      <input type="radio" name="semaine" value="5" checked> Semaine 5<br>
      <input type="radio" name="semaine" value="6" checked> Semaine 6<br>

      <SELECT name="module">
        <OPTION disabled selected> Choissisez le module <br>
        <?php
        foreach($modules as $value) {
          foreach ($value as $key => $value2) {
           ?>
          <OPTION><?php echo $value2; ?> </OPTION>
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
