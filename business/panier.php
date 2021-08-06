<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PHP PAGE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link " href="./homepage.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="./article.php">article</a>
            <a class="nav-item nav-link" href="./panier.php">panier</a>
        </div>
    </div>
</nav>





<?php
$produit = [
    ["titre" =>"pantalon",
        "description"=> "Notre marque de fabrique fait peau neuve : un style workwear, une coupe carotte intemporelle et féminine, une ceinture large",
        "prix" => "27.80",
        "image" =>"img/pantalon-femme.jpeg"
    ],
    ["titre" =>"jupe",
        "description"=> "Notre marque de fabrique fait peau neuve : un style workwear, une coupe carotte intemporelle et féminine, une ceinture large",
        "prix" => "35",
        "image" =>"img/jupe-femme.jpeg"

    ],    ["titre" => "short homme",
        "description"=> "Notre marque de fabrique fait peau neuve : un style workwear",
        "prix" => "50",
        "image" =>"img/short-homme.jpg"

    ],

];

foreach ($produit as $item){
    echo"<h1>".$item["titre"]."</h1>" .'<br>';
    echo "<img src='".$item["image"]."'>";
    echo"<p>".$item["description"]."</p>" .'<br>';
    echo"<p>".$item["prix"] ."€</p>" ;

}


?>
</body>
</html>