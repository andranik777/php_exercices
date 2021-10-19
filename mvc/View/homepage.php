<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>

<div class="container">
    <h1>Welcome to Home page </h1>

    <h2>Les articles</h2>
    <a href="index.php?controller=article&action=list">Voir seulement les articles</a>
    <?php
    require 'Parts/table_articles.php'
    ?>

    <h3>Les planetes</h3>
    <a  href="index.php?controller=planet&action=list">Voir seulement les planets</a>
    <?php
    require 'Parts/table_planets.php'
    ?>
</div>
<?php
include 'Parts/scripts.html'
?>
</body>
</html>