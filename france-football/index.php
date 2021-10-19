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
<body class="text-center">
<?php
include "parts/header.php";
include "functions/display-football.php";

?>
<main class="container mt-3" style="height: 2000px">
    <h1>Les Joueurs de france</h1>

    <?php
    if(isset($_GET["message"])){
        echo "<p class='text-success'>{$_GET["message"]}</p>";
    }
    ?>
    <?php
    if(isset($_SESSION["email"])){
        if($_SESSION["email"] == "ddechamps"){
        echo '<div class="d-flex justify-content-center">
            <div class="card text-center" style="width: 18rem; margin-top: 3rem">
                <img class="card-img-top" src="public/images/cowritecar.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Créer un Joueur</h5>
                    <a href="footballor-create.php" class="btn btn-primary">Créer</a>
                </div>
            </div>
    
        </div>';
        }
    }
    ?>



    <div class="d-flex flex-wrap justify-content-center">
    <?php
    $bdd = new PDO('mysql:host=localhost:3306;dbname=france-football;charset=utf8', 'root', 'Andranik1');

    $reponse = $bdd->query('SELECT * FROM team');

    displayFootballor($reponse)

    ?>
    </div>

</main>



<?php
include "parts/footer.php"
?>

</body>

</html>