<?php

class vue_pointage {

  public function afficherVue($etudiant, $groupes) {

    ?>

    <!DOCTYPE html>
    <html lang="fr_FR">
    <!--Version 1.00-->

    <head>
        <title>Pointage absences</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Service Assiduité IUT</h1>
        <nav>
            <ul>
                <li>
                    <a href="../index.html">Accueil</a>
                </li>
                <li>
                    <a href="vue_pointage.php">Pointage absences</a>
                </li>
                <li>
                    <a href="vue_consultation.php">Consultation absences</a>
                </li>
                <li >
                    <a href="vue_gestion.php">Gestion absences</a>
                </li>
            </ul>
        </nav>
        <p>Identifié en tant que : <?php echo $_SESSION["login"]?></p>
        <p>Affichage de la date ici</p>
        <div class="row">
            <!--SELECTION GROUPE ET MATIERE-->
            <div class="col card text-centers">
                  <p>Cours</p>
                <form action="index.php" method="post">
                      <p>Selectionner un groupe :</p>
                      <select name="groupe">
                        <?php  foreach ($groupes as $courant){
                          ?>
                          <option value="<?php echo $courant["Numero"] ?>" <?php if ($_SESSION["groupe"] == $courant["Numero"]) {echo "selected";}?>><?php echo "Groupe ".$courant["Numero"] ?></option>
                        <?php } ?>
                      </select>
                      <input type="submit" value="Valider"/>
                </form>
            </div>
            <!--SELECTION ABSENTS-->
            <div class="col card" style="height:100%;">
              <?php if ($etudiant != null) {?>
                <form action="index.php" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Selection des absents :</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($etudiant as $row){
                              ?><tr>
                                  <td>
                                    <input type="checkbox" name="idAbsent[]" value="<?php echo $row['id']?>"/><?php echo $row['nom']." ".$row['prenom'];?>
                                  </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type="submit" value="Pointer Absent"/>
                </form>
                <?php }?>
            </div>
            <!--VALIDATION DES DONNEES-->
            <div class="col card">
                <p>Validation de la selection :</p>

            </div>
        </div>
    </body>

    </html>


    <?php

  }

}

 ?>
