<!DOCTYPE html>
<html lang="fr_FR">
<!--Version 1.00-->

<?php
session_start();
?>

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
            <form action="">
                <p>Selectionner un groupe :</p>
                <select name="groupe">
                    <option value="">groupe 1</option>
                    <option value="">groupe 2</option>
                    <option value="">groupe 3</option>
                    <option value="">groupe 4</option>
                  </select>
                <p>Selectionner une matière :</p>
                <select name="matiere">
                        <option value="">matiere 1</option>
                        <option value="">matiere 2</option>
                        <option value="">matiere 3</option>
                        <option value="">matiere 4</option>
                </select>
            </form>
        </div>
        <!--SELECTION ABSENTS-->
        <div class="col card" style="height:100%;">
            <form action="">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Selection des absents :</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" value="id1"> ETU1<br></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <!--VALIDATION DES DONNEES-->
        <div class="col card">
            <p>Validation de la selection :</p>

        </div>
    </div>
</body>

</html>
