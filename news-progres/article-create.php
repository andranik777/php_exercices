<?php
include "functions/upload-file.php";
$image = upploadImage();
?>


<?php

$bdd = new PDO('mysql:host=localhost:3306;dbname=animal-store;charset=utf8', 'root', 'Andranik1');

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$formErrors =[];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nom"]) || empty($_POST["description"]) || empty($_POST["id_category"])) {
        if (empty($_POST["nom"])) {
            $formErrors[] = "nom vide";
        }
        if (empty($_POST["description"])) {
            $formErrors[] = "description vide";
        }

        if (empty($_POST["id_category"])) {
            $formErrors[] = "id_category  vide";
        }
        if (empty($_POST["prix"])) {
            $formErrors[] = "prix vide";
        }

        if (preg_match("/^\d+$/", $_POST["id_category"]) == 0) {
            $formErrors[] = "Id category doit être un nombre";
        }

    }


    if (count($formErrors) == 0 && $image) {

        $reponse = $bdd->prepare('INSERT INTO article (nom,description,id_category,prix,img) 
VALUES(:nom, :description, :id_category,:prix,:img)');

        if (empty($_COOKIE["image"])) {
            $reponse->execute(

                [
                    "nom" => $_POST["nom"],
                    "description" => $_POST["description"],
                    "id_category" => $_POST["id_category"],
                    "prix" => $_POST["prix"],
                    "img" => "public/images/pate-pour-chat.jpeg"


                ]);
        }
        else {
            $reponse->execute(

                [
                    "nom" => $_POST["nom"],
                    "description" => $_POST["description"],
                    "id_category" => $_POST["id_category"],
                    "prix" => $_POST["prix"],
                    "img" =>$_COOKIE["image"]

                ]);

        }
    }

}

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
<body>
<?php
include "parts/header.php"

?>


<section class="container mt-5">

<div class="login-container d-flex justify-content-center">

        <div class="col-md-6 login-form-2">
            <h3>Créer un article</h3>
            <form method="POST" action="article-create.php" enctype="multipart/form-data">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nom" value="" name="nom" />
                </div>

                <div class="form-group mt-3">
                <textarea id="story" name="description" rows="5" cols="50" placeholder="description"></textarea>

                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" placeholder="id_category" value="" name="id_category" />
                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" placeholder="prix" value="" name="prix" />
                </div>

                <div class="form-group mt-3">

                    <label for="avatar">Choisir une image</label>
                    <input type="file"
                           id="avatar" name="avatar"
                           accept="image/png, image/jpeg">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success mt-3" value="Creer" />
                </div>

                </div>
            </form>


    </div>
    <div class="d-flex justify-content-around flex-column mt-3">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(count($formErrors)!=0 || !$image) {

           foreach ($formErrors as $error) {
               echo("<p style='color: red;margin-left: 18rem'>$error</p> <br>" );
           }
        }

        else {
            echo '<p style="color: green;">Votre article à été ajouté avec succès</p>';
        }
        }
        ?>

    </div>

    </div>




</section>

<?php include "parts/footer.php"?>

<?php include "parts/global-script.php"?>
</body>
</html>


