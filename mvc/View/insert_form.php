<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>
<div class="container">
<h1>Ajout d'un nouvel article</h1>

    <a href="../correctionMVC/index.php?controller=default&action=home">
        <button style="margin-bottom:10px;" class="btn btn-success">Revenir en arrière</button>
    </a>

<form method="post" action="index.php?controller=article&action=addArticle">
<label>Titre</label>
<input name="titre" class="form-control">

<label>Contenu</label>
<input name="contenu" class="form-control">
    <input class="btn btn-success" type="submit" value="valider">
</form>
</div>
<?php
 include 'Parts/scripts.html'
?>
</body>