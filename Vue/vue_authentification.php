<?php

class vue_authentification {
  public function afficherVue() {
    ?>
    
    <!DOCTYPE html>
    <html lang="fr_FR">
    <!--Version 1.00-->

    <head>
        <title>Connexion au service</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Connexion au service</h1>
        <form action="index.php" method="post">
            Identifiant :
            <input type="text" name="identifiant" value=""><br /><br />
            Mot de passe :
            <input type="password" name="password" value=""><br /><br />
            <input type="submit" value="Connexion">
        </form>
    </body>

    </html>

    <?php
  }
}
?>
