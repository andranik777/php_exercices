<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>
<div class="container">
    <h1>Mise à jour de l'article <?php echo $article->getTitre();?></h1>

    <a href="../correctionMVC/index.php?controller=default&action=home">
        <button style="margin-bottom:10px;" class="btn btn-success">Revenir en arrière</button>
    </a>

    <form method="post" action="index.php?controller=article&action=updateArticle&id=<?php echo $article->getId()?>">
        <label>Titre</label>
        <input name="titre" value="<?php echo $article->getTitre()?>" class="form-control">

        <label>Contenu</label>
        <input name="contenu" value="<?php echo $article->getContenu()?>" class="form-control">
        <input class="btn btn-success" type="submit" value="valider">
    </form>
</div>
<?php
include 'Parts/scripts.html'
?>
</body>