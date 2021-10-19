<?php
include "functions/user-function.php";
CheckUser();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "parts/global-css.php"  ?>
</head>
<body>
<?php
include "parts/header.php";
include "functions/display-article.php";
?>
<main class="container" style="height: 2000px">
    <h1>Les articles</h1>

    <?php
    if(isset($_GET["message"])){
        echo "<p class='text-success'>{$_GET["message"]}</p>";
    }
    ?>

    <div class="d-flex flex-wrap justify-content-center">
    <?php
    $bdd = new PDO('mysql:host=localhost:3306;dbname=news_progres;charset=utf8', 'root', 'Andranik1');

    $reponse = $bdd->query('SELECT * FROM article JOIN user ON article.id_user = user.id_user JOIN category ON category.id_category = article.id_category');


    displayArticle($reponse);
    ?>
    </div>

</main>



<?php
include "parts/footer.php"
?>

</body>
</html>