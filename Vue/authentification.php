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
                <a href="depot.php">Dépôt</a>
            </li>
            <li>
                <a href="consultation.php">Consultation</a>
            </li>
            <li>
                <a href="gestion.php">Gestion</a>
            </li>
        </ul>
    </nav>
    <h2>Connexion au service</h2>
    <form action="../Controleur/Authentification.php" method="post">
        Identifiant :
        <input type="text" name="identifiant" value=""><br />
        Mot de passe :
        <input type="password" name="pass" value=""><br />
        <input type="submit" value="Connexion">
    </form>
</body>

</html>
