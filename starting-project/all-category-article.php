<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "parts/global-css.php"?>

</head>
<body>
<?php
include "functions/ColorMode.php";


try {
    $bdd = new PDO('mysql:host=localhost:3306;dbname=animal-store;charset=utf8', 'root', 'Andranik1');
    $reponse = $bdd->query('SELECT * FROM article  join category on article.id_category = category.id_category ORDER by id');

}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}


?>

<?php

?>

<?php
include "parts/header.php";


?>
<table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOM</th>
                <th scope="col">Description</th>
                <th scope="col">id category</th>
                <th scope="col">Nom category</th>


            </tr>
            </thead>
            <tbody>
            <?php
            while ($donnees = $reponse->fetch())
            {
                echo'<tr>
                  <td>'.$donnees["id"].'</td>
                  <td>'.$donnees["nom"].'</td>
                  <td>'.$donnees["description"].'</td>
                  <td>'.$donnees["id_category"].'</td>
                   <td>'.$donnees["nom_category"].'</td>


             </tr>';
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
            ?>
            </tbody>
</table>

/
</body>
</html>
