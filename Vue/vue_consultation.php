<?php

class vue_consultation {
  private function afficherVue() {
    ?>

    <!DOCTYPE html>
    <html lang="fr_FR">
    <!--Version 1.00-->

    <?php
    session_start();
    ?>


    <head>
        <title>Consultation Absences</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Assiduité</h1>
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
                <li>
                    <a href="vue_gestion.php">Gestion absences</a>
                </li>
            </ul>
        </nav>
        <h2>Consulter les absences</h2>
    </body>

    </html>


    <?php
  }
}

 ?>
