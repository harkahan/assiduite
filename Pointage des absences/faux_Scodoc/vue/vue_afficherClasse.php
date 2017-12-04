<?php
class VueClasse{

// affiche le tableau de notation des absences de la classe donnée ainsi que les absences déjà enregistrés.

function afficherTab($nomPossible, $absence) {

header("Content-type: text/html; charset=utf-8");

?>

<script>
var obj = { Title: "afficherClasse", Url: "afficherClasse.html" };
history.pushState(obj, obj.Title, obj.Url);
</script>

<html>
  <head>
    <meta charset="utf-8">
    <title>Vue Classe</title>
    <link rel="stylesheet" href="vue/reset.css">
    <link rel="stylesheet" href="vue/css.css">
  </head>
  <body>
  <form class="" action="index.php" method="post">

  <table style="width:100%">
  <tr>
    <th>Eleve</th>
    <th colspan="2">Lundi</th>
    <th colspan="2">Mardi</th>
    <th colspan="2">Mercredi</th>
    <th colspan="2">Jeudi</th>
    <th colspan="2">Vendredi</th>
  </tr>
  <tr>
    <td></td>
    <td>Matin</td>
    <td>Après-midi</td>
    <td>Matin</td>
    <td>Après-midi</td>
    <td>Matin</td>
    <td>Après-midi</td>
    <td>Matin</td>
    <td>Après-midi</td>
    <td>Matin</td>
    <td>Après-midi</td>
  </tr>
  <?php
  $cpt=0;
  // pour chaque étudiant du groupe, on l'affiche et on implement le formulaire
  foreach ($nomPossible as $value2) {
    foreach ($value2 as $key => $value) {
      $cpt++;
      $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
      $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
      // le system de date ne prend en compte que la semaine en cours.
      ?>
      <td class="etudiant"><?php echo ($value) ;?></td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'monday this week' ) )."_00:00:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'monday this week' ) )."_00:13:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'tuesday this week' ) )."_00:00:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'tuesday this week' ) )."_00:13:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'wednesday this week' ) )."_00:00:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'wednesday this week' ) )."_00:13:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'thursday this week' ) )."_00:00:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'thursday this week' ) )."_00:13:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'friday this week' ) )."_00:00:00 ".$value; ?>" value="oui">  </td>
      <td><input type="checkbox" id="etudiant" name="<?php echo date( 'Y-m-d', strtotime( 'friday this week' ) )."_00:13:00 ".$value; ?>" value="oui">  </td>
    </tr>
  <?php
  } }?>

</table>

      <input type="submit"  value="Envoyer">
    </form>

    <?php
    if (is_array($absence)){
      foreach ($absence as $value3) {
        foreach ($value3 as $key => $value4) {
          echo ("<br>Absence : ".$value4);

        }
      }
    }
    ?>

  </body>
</html>

<?php
}
}
?>
