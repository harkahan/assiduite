<!DOCTYPE html>
<html lang="fr_FR">
<!--Version 1.00-->

<head>
    <title>Connexion au service </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap-4.0.0-beta.2-dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body class="text-center">
    <h1>Assiduité</h1>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.html">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="depot.php">Dépôt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="consultation.php">Consultation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gestion.php">Gestion</a>
            </li>
        </ul>
    </nav>
    <h2>Connexion au service</h2>
    <form action="../Controleur/Authentification.php" method="post">
        Identifiant :
        <input type="text" name="identifiant" value=""><br> Mot de passe :
    <input type="password" name="pass" value=""><br>
<input class="form-check-input" type="checkbox"> Se souvenir de moi</br>
<input class="btn btn-outline-primary" type="submit" value="Connexion">
</form>
</body>

</html>
