<?php

class vue_authentification {
  private function afficherVue() {
    ?>
    
    <!DOCTYPE html>
    <html lang="fr_FR">
    <!--Version 1.00-->

    <head>
        <title>Connexion au service</title>
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
        <h2>Connexion au service</h2>
        <form action="../index.php" method="post">
            Identifiant :
            <input type="text" name="identifiant" value=""><br />
            Mot de passe :
            <input type="password" name="password" value=""><br />
            <input type="submit" value="Connexion">
        </form>
    </body>

    </html>

    <?php
  }
}
?>
