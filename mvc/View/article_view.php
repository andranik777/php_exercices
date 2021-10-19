<html>
    <head>
        <?php
        include 'Parts/stylesheets.html'
        ?>
    </head>

    <body>
    <div class="container">
        <a href="index.php?controller=default&action=home">Tout voir ! </a>
    <h1>Welcome to article page</h1>

        <?php
         require 'Parts/table_articles.php'
        ?>
    </div>
    <?php
    include 'Parts/scripts.html'
    ?>
    </body>
</html>