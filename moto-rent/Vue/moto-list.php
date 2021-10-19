<html>
<head>
    <?php
    // J'inclue ici tous les fichiers css globaux à l'application
    include 'Vue/parts/stylesheets.php';
    ?>

    <!--Si j'avais un css spécifique pour cette page il serait ici-->
</head>
<body>

<?php
// J'inclus un header (c'est une vue commune à plusieurs page on évite ici la dupplication de code)
include 'Vue/parts/header.php';
?>
<h1>Ici j'affiche tous mes articles</h1>

<a href="index.php?controller=article&action=ajout">Ajouter un article</a>
<!--Je cré mon tableau qui contiendra tous mes articles-->
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Quantité</th>
        <th scope="col">Prix</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    var_dump("yaya");
        // Pour chaque éléments de ma variable articles (provenant de MotoController Ligne 24)
        // j'affiche une nouvelle ligne sur mon tableau. Vu que la variable contient un tableau d'objet
        // (retour de notre MotoManager), nous appellerons les getteurs et les setteurs.
        foreach ($articles as $article){
            echo('<tr>
<td>'.$article->getId().'</td>
<td>'.$article->getName().'</td>
<td>'.$article->getQuantity().'</td>
<td>'.$article->getPrix().'</td>
<td>
<a href="index.php?controller=article&action=detail&id='.$article->getId().'">Voir en détail</a>
<a href="index.php?controller=article&action=edit&id='.$article->getId().'">Editer l\'article</a>
</td>
            </tr>');
        }
    ?>
    </tbody>
</table>

</body>
</html>