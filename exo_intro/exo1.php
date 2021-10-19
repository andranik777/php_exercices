<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $hello = "Hello word";
    echo "<h1>Titre en php</h1>";
    $curentDate ="5/08/2021";
    echo "Aujourd'hui on est ". $curentDate . " " . $hello;

    $nom = "HAKOBYAN";
    $prenom = "Andrnaik";
    $age = 25;

    echo "<p>je m'appelle .$nom .$prenom j'ai $age ans</p>";

    echo var_dump($nom . "<br>");
    echo var_dump("Hello word" . "<br>");

    echo var_dump(true) . "<br>";
    echo var_dump(1.78) ."<br>";

?>

</body>
</html>