<html>
<head>
    <?php
        include 'Vue/parts/stylesheets.php';
    ?>
</head>
<body>
<?php
    include 'Vue/parts/header.php';
?>
<h1>La liste de mes catégories !</h1>

<a href="index.php?controller=category&action=displayForm">Ajouter une categorie</a>


<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Ordre affichage</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
     foreach ($allCategories as $category){
         echo(' <tr>
        <th scope="row">'.$category->getId().'</th>
        <td>'.$category->getNom().'</td>
        <td>'.$category->getOrdreAffichage().'</td>
        <td><a href="index.php?controller=category&action=supprimer&id='.$category->getId().'">
        Supprimer</a></td>
    </tr>');
     }
    ?>

    </tbody>
</table>

<?php
include 'Vue/parts/script.php';
?>

</body>
</html>