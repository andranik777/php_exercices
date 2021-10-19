<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>
<div class="container">
    <h1>Welcome to planet page </h1>
    <a href="index.php?controller=default&action=home">Tout voir ! </a>

    <?php
    require 'Parts/table_planets.php'
    ?>
</div>
<?php
include 'Parts/scripts.html'
?>
</body>
</html>