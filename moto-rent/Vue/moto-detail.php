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

<h1>Détail de l'article <?php echo($article->getName());?></h1>

<h2>Catégorie : <?php echo($article->getCategory()->getNom()); ?></h2>
<img src="<?php echo($article->getPhoto())?>">

<h2>Ce produit coute <?php echo($article->getPrix());?></h2>
</body>
</html>