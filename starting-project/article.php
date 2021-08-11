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

<body>
<?php include "parts/header.php"?>

    <?php
 $article =  [
     'image' => 'croquettes.jpg',
     'nom' => 'Croquettes pour chien',
     'description'=> 'Pour tous types de chiens',
     'prix'=> 45.49
 ];
?>

<h1><?php echo($article['nom']);?></h1>
<div class="row">
<img src="public/images/<?php echo($article['image']);?>">
</div>

<div class="row">
    <div class="col-md-12"><?php echo($article['description']) ?></div></div>
<a href="index.php"><button class="btn btn-success">Retour !</button></a>



<?php include "parts/footer.php"?>

<?php include "parts/global-script.php"?>

</body>


</html>