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
    <a class="navbar-brand" href="#">PHP Page</a>
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
$article = [
    "photo" => "img/ours-polaire.jpeg",
    "titre" => "Groenland : Un ours blanc classé « à problèmes » après avoir attaqué une équipe de documentaristes",
    "description" => "Un ours blanc a été classé « à problèmes » mardi après avoir attaqué une équipe de documentaristes dans une station du nord-est du Groenland, a annoncé l’armée danoise. En cas de récidive, il pourrait être abattu. Tôt lundi matin, l’ours est parvenu à passer la tête par une fenêtre mal fermée dans un local de recherche où logeait l’équipe de tournage, à environ 400 mètres à l’écart de la petite base militaire de Daneborg.
Selon le récit du « Commando arctique », unité danoise stationnée sur place, l’animal a alors mordu un des trois hommes à la main, avant que l’équipe parvienne à le faire fuir en utilisant ses pistolets d’alarme. Transporté dans un premier temps à Daneborg, le documentariste blessé a dû être évacué en Islande."
];

$elo = $article['photo'];

echo '<img src="'.$article['photo'] .'">' ."<br>";

echo "<h1>".$article['titre'] ."</h1>";

echo "<p>".$article['description']."</p>";

?>
</body>
</html>