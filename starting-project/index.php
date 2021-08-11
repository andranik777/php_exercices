<?php
include "functions/user-function.php";
CheckUser();
?>

<?php
include "functions/ColorMode.php";

$color = GetMode();

SetMode($color);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "parts/global-css.php"?>
</head>
<body class="<?php
echo $_COOKIE["mode"]."-color";
?>">
<?php include "parts/header.php"?>

<div id="user" class="mt-3">

<?php
echo "Salut " . $_SESSION["prenom"] ." ton email est ".$_SESSION["email"];

?>
</div>
<div id="main" class="d-flex flex-wrap justify-content-center">

    <?php


    $article =  [
            [
        'image' => 'public/images/croquettes.jpg',
        'nom' => 'Croquettes pour chien',
        'description'=> 'Pour tous types de chiens',
        'prix'=> '32.99'],
        [
            'image' => 'public/images/no-picture.png',
            'nom' => 'Croquettes pour chat',
            'description'=> 'Pour tous types de chat',
            'prix'=> '31.99'],
        [
            'image' => 'public/images/no-picture.png',
            'nom' => 'Paté pour chat',
            'description'=> 'Pour tous types de chat',
            'prix'=> '21.99'],
        [
            'image' => 'public/images/no-picture.png',
            'nom' => 'Paté pour chien',
            'description'=> 'Pour tous types de chiens',
            'prix'=> '21.99'],
    ];
    include "functions/product-function.php";

    displayProduct($article);
    ?>

</div>





<?php include "parts/footer.php"?>

<?php include "parts/global-script.php"?>

</body>
</html>