<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>
<div class="container">
    <h1>Atticle <?php echo($article->getTitre()); ?></h1>
    <h2> <?php echo($article->getContenu()); ?></h2>
    <a href="index.php?controller=default&action=home">go home</a>
</body>