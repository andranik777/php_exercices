<?php
include "functions/user-function.php";
CheckUser();
if(isset($_SESSION["email"])){
    if($_SESSION["email"] !== "ddechamps"){
        header("Location: index.php");
    }
}
?>


<?php

$bdd = new PDO('mysql:host=localhost:3306;dbname=france-football;charset=utf8', 'root', 'Andranik1');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$formErrors =[];
$reponse = $bdd -> query("SELECT COUNT(id) from team");
$nb_player = $reponse ->fetch();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["date_naissance"])|| empty($_POST["poste"])) {
        if (empty($_POST["nom"])) {
            $formErrors[] = "nom vide";
        }
        if (empty($_POST["prenom"])) {
            $formErrors[] = "prenom vide";
        }

        if (empty($_POST["date_naissance"])) {
            $formErrors[] = "date_naissance  vide";
        }

        if (empty($_POST["poste"])) {
            $formErrors[] = "poste  vide";
        }
    }



    if($nb_player[0] >=23) {
        $formErrors[] = "Vous pouvez ajouter au maximum 5 joueurs";
    }

    if (count($formErrors) == 0 ) {
        session_start();
        $reponse = $bdd->prepare('INSERT INTO team (prenom,nom,date_naissance,poste) 
      VALUES(:prenom,:nom, :date_naissance, :poste)');

            $reponse->execute(
                [   "prenom"=> $_POST["prenom"],
                    "nom" => $_POST["nom"],
                    "date_naissance" => $_POST["date_naissance"],
                    "poste" => $_POST["poste"]
                ]);
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
            <form method="POST" action="footballor-create.php" >

                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" placeholder="Nom" value="" name="nom" id="nom" />
                </div>
                <div class="form-group mt-3">
                    <label for="prenom">Prenom:</label>
                    <input type="text" class="form-control" placeholder="Prenom" value="" name="prenom"  id="prenom"/>

                </div>

                <label for="birth">Date de naissance:</label>
                <input type="date" id="birth" name="date_naissance"
                       min="1900-01-01" max="2021-08-31">

                <div class="form-group mt-3">
                    <label for="poste">Poste:</label>
                    <input type="text" class="form-control" id="poste" placeholder="poste" value="" name="poste"  />
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

            if(count($formErrors)!=0 ) {

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


