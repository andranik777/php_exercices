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
include("composant/navbar.php")
?>


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


<?php
include("composant/footer.php");
include("public/global-scripts.php");

?>

</body>
</html>