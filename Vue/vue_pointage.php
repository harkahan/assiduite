<?php

class vue_pointage {

  public function afficherVue($etudiant) {

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
        <p>Identifié en tant que : XXXXXX</p>
        <p>Affichage de la date ici</p>
        <div class="row">
            <!--SELECTION GROUPE ET MATIERE-->
            <div class="col card text-centers">
                  <p>Cours</p>
                <form action="index.php" method="post">
                      <p>Selectionner un groupe :</p>
                      <select name="groupe">
                          <option value="1">Groupe 1</option>
                          <option value="2">Groupe 2</option>
                          <option value="3">Groupe 3</option>
                          <option value="4">Groupe 4</option>
                      </select>
                      <input type="submit" value="Valider"/>
                </form>
            </div>
            <!--SELECTION ABSENTS-->
            <div class="col card" style="height:100%;">
              <?php if ($etudiant != null) {?>
                <form action="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Selection des absents :</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($etudiant as $key): ?>
                              <tr>
                                <td><?php echo $key["nom"]." ".["prenom"] ?></td>
                              </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
