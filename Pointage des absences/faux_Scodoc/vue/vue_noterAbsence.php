<?php
class VueNoterAbsence{

// permet d'afficher les informations d'un professeur ( non utilisé)
function afficherVueAbsence($nomProf, $prenomProf) {

header("Content-type: text/html; charset=utf-8");

?>
<script>
var obj = { Title: "absences", Url: "noterAbsence.html" };
history.pushState(obj, obj.Title, obj.Url);
</script>


<html>
  <head>
    <meta charset="utf-8">
    <title>Vue Absence</title>
    <link rel="stylesheet" href="vue/reset.css">
		<link rel="stylesheet" href="vue/css.css">
  </head>
  <body>
      Nom du professeur: <?php echo $nomProf ?><br>
      Prenom du professeur: <?php echo $prenomProf ?><br>
      Selection absences <a href="vue3.php"><br>
  </body>
</html>
<?php
}
}
?>
