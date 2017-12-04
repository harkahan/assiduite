<?php
class vue_choixClasse{

  function __construct() {}

    function afficher($fail){

    //header("Content-type: text/html; charset=utf-8");

?>


<html>
<head>
  <meta charset="utf-8" content="width=device-width, initial-scale=1">
  <title>Entrée des informations</title>
  <link rel="stylesheet" href="vue/css/passage.css">

  <script>
  //Ici, du javascript pour pouvoir gérer certaines erreurs possibles directement
    function init(){
      //On récupère de nombreux élements avec leurs ids
      var t1=document.getElementById("test1");
      var t2=document.getElementById("test2");
      var lejour = document.getElementById("Jour");
      var lemois = document.getElementById("Mois");
      //On rajoute des controleurs/listeners en cas de clic
      t1.addEventListener("click", clicb1, false);
      t2.addEventListener("click", clicb2, false);
      //On rajoute des controleurs/listeners en cas de deselection
      lemois.addEventListener("blur", changementJour, false);
      lejour.addEventListener("blur", changementJour, false);
      }

    //Lorsque l'on clic dessus on fait une transition graphique
    function clicb1() {
      this.style.background = "red";
      this.style.transitionDuration = "1s"; 
      document.getElementById("test2").style.background = "white";
    }

    //De même pour ce bouton
    function clicb2() {
      this.style.background = "red";
      this.style.transitionDuration = "1s"; 
      document.getElementById("test1").style.background = "white";
    }

    //Une fonction pour le changement de date, afin de savoir si c'est possible ou non, si ce n'est pas possible
    //On retire l'affichage de l'envoi
    function changementJour() {
      var e = document.getElementById("Jour");
      //On récupère la valeur du jour
      var jour = e.options[e.selectedIndex].value;
      //On récupère la valeur du mois en faisant appel à une autre fonction
      le_mois = getMois();
      //On regarde si le jour est 31
      if (jour==31) {
        // Dans ce cas, on regarde si c'est possible avec le mois
        if (le_mois == 2 || le_mois == 4 || le_mois == 6 || le_mois== 8 || le_mois==10 || le_mois == 12) { 
          alert("Vous avez selectionner un mois qui ne contient pas autant de jours");
          document.getElementById("envoi").style.display = "none";
        }
      }
      // On regarde si c'est le mois de février, puisqu'il y a des règles particulières
      if (le_mois == 2) {
        //leapYear() montre si c'est une année bissextile
        year = leapYear();
          if (year!= true) {
            //Si non on ne peut pas selectionner le 30 ou le 29
            if (jour==30 || jour==29) {
              alert("Vous avez selectionner un mois qui ne contient pas autant de jours");
              document.getElementById("envoi").style.display = "none";
            }
          }
          else {
            //Si oui on ne peut pas selectionner le 30
            if (jour==30) {
            alert("Vous avez selectionner un mois qui ne contient pas autant de jours");
            document.getElementById("envoi").style.display = "none";
            }
          }
        }
        else {
          //Sinon tout va bien et l'envoi s'afficher normalement
          document.getElementById("envoi").style.display = "initial";
        }
      }

    function getMois() {
      //On récupère le mois
      var m = document.getElementById("Mois");
      var mois = m.options[m.selectedIndex].value;
      return mois;
    }

    function leapYear() {
      //Fonction pour savoir si c'est une année bissextile ou non
      var y = document.getElementById("An");
      var year = y.options[y.selectedIndex].value;
      return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
    }
  
  </script>


</head>

<?php 

  if(gettype($fail)== "boolean"){
    if($fail){//si il y a déjà eu une connection on affiche le message:
      ?><p id="erreur"> module, classe, semaine incorrect </p><?php
      }
      }else{
      throw new Exception("Problème avec le log");
     }

// Ici, on récupère la date du serveur via du php
  $timezone = date_default_timezone_get();
  $date = date('d/m/Y G:i:s ', time());

//Fonctione pour savoir ce qui doit être selectionner de base, on regarde si l'heure est
//inférieure à 12 ou non, et on met en fonction
  if (date('G') < 12) {
    $demi = "matin";
  }
  else {
    $demi = "après-midi";
  }
?>

<h3> Veuillez entrer les informations pour le pointage des étudiants </h3>

<body onload="init()">
  </br>
  </br>
    <form action="index.php" method="post">
      <div id="formulaire"> 

        <div id="donnees">

        <div class="titre_input">Module :</div> <input type="text" id="Module" name="Module" placeholder="Module" autofocus required/><br>
        </div>
        <div class="titre_input">Classe :</div> <input type="text" id="Classe" name="Classe" placeholder="Classe" required/><br>
        </div>

      </div>

        <div id="date">

          <div class="titre_input">Jour</div>
            <div class="dropdown">
              <select id="Jour" name="Jour">
                <?php //Fonction en PHP pour remplir le select des différents jour de 1 à 31
                 for ($i=1; $i<32; $i++){ ?>

                  <option value="<?php echo $i; ?>"
                <?php //Fonction pour selectionner de base le bon jour
                if ($i== date('d', time())) {
                  echo "selected"; } ?> >
                <?php echo $i;?>
               </option>

               <?php } ?>

              </select>
            </div>

            <br>

            <div class="titre_input">Mois</div>
              <div class="dropdown">
                <select id="Mois" name="Mois">
                  <?php //Fonction en PHP pour remplir le select des différents mois de 1 à 12
                  for ($i=1; $i<13; $i++){ ?>

                  <option value="<?php echo $i; ?>"
                  <?php //Fonction pour selectionner de base le bon mois
                  if ($i== date('m', time())) {
                    echo "selected"; } ?> >
                  <?php echo $i;?>
                  </option>

                  <?php
                  }

                  ?>
                </select>
              </div>

              <br>

              <div class="titre_input">Annee</div>
                <div class="dropdown">
                  <select name="Annee" id="An">
                    <?php //Fonction en PHP pour remplir le select des différents années
                    for ($i=2016; $i<2021; $i++){ ?>

                    <option value="<?php echo $i; ?>"
                    <?php //Fonction pour selectionner de base la bonne année
                    if ($i == date('Y', time())) {
                      echo "selected"; } ?> >
                    <?php echo $i;?>
                    </option>

                    <?php
                    }

                    ?>
                  </select>
                </div>
      
              </div>


              <br>
              <br>

              <div id="final">
                <input type="radio" name="essai"  <?php if ($demi=="matin") echo "checked" ?> value="matin"> Matin
                <label for="test1" id="test1"></label>
                <input type="radio" name="essai"  <?php if ($demi=="après-midi") echo "checked" ?> value="après-midi"> Après-midi
                <label for="test2" id="test2"></label>


              <br>
              <br>
              <br>

              <input type="submit" name="passage" value="envoyer" id="envoi"/>

              <br>

              </div>
            </div>

    </form>
</body>

<footer>

IUT Informatique de Nantes 2017 - Lien vers les images utilisées 

</footer>

</html>

<?php 
}
}
?>