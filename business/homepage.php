<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("public/global-stylesheets.php ");?>

</head>
<body>

<?php
include("composant/navbar.php");
?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">


    <?php
    $arrImage = ["img/jupe-femme.jpeg","img/pantalon-femme.jpeg","img/ours-polaire.jpeg" ];

    for ($i =0; $i<sizeof($arrImage);$i++ ){
        if($i==0){
            echo '<div class="carousel-item active ">
            <img src="'. $arrImage[0] .'" class="d-block w-100">
        </div>';
        }
        else {
            echo '<div class="carousel-item">
            <img src="'. $arrImage[$i] .'" class="d-block w-100">
        </div>';
        }

    }
    ?>

    </div>


    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

</div>

<?php
include ("composant/footer.php");
include ("public/global-scripts.php");
?>

</body>
</html>