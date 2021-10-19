<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>
<div class="container">
    <h1>Ajout de la planète</h1>

    <a href="../correctionMVC/index.php?controller=planet&action=list">
        <button style="margin-bottom:10px;" class="btn btn-success">Revenir en arrière</button>
    </a>

    <form method="post" action="index.php?controller=planet&action=processFormAjout" enctype="multipart/form-data">
        <label>Nom de la planète</label>
        <input name="nom" class="form-control">

        <label>Allegiance de la planète</label>
        <input name="allegiance" class="form-control">
<br>
        <label>Image de la planète</label>
        <br>
        <input type="file" name="imagePlanet"> <br>
        <br>
        <input class="btn btn-success" type="submit" value="valider">
    </form>

    <?php
    if (isset($errors)) {
        echo('<h2 style="color: red">Les erreurs !!!!!!</h2>
<ol>');
        foreach ($errors as $error) {
            echo('<li>' . $error . '</li>');
        }
        echo('</ol>');
    }
    ?>
</div>
<?php
include 'Parts/scripts.html'
?>
</body>