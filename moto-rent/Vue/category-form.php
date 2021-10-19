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
<div class="container">
    <!--L'attribut action est important. On passe encore par notre routeur
    (point d'entrée index.php)-->
<form method="post" action="index.php?controller=category&action=submitForm">
    <div class="form-group">
        <label for="exampleInputEmail1">Nom de la catégorie</label>
        <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom">
   </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Ordre d'affichage</label>
        <input type="number" name="ordre_affichage" class="form-control" id="exampleInputPassword1" placeholder="Ordre">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <?php
    include 'Vue/parts/errors-form.php';
    ?>

</div>
</body>