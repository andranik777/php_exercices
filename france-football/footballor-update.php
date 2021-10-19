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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie("id", $_POST["id"], time() + 3600);
    setcookie("prenom", $_POST["prenom"], time() + 3600);
    setcookie("nom", $_POST["nom"], time() + 3600);
    setcookie("date_naissance", $_POST["date_naissance"], time() + 3600);
    setcookie("poste", $_POST["poste"], time() + 3600);

    header("Refresh:0");

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
include "parts/header.php";

?>


<section class="container mt-5">

    <div class="login-container d-flex justify-content-center">

        <div class="col-md-6 login-form-2">
            <h3>Modifier le joueur</h3>
            <form method="POST" action="football-uptador.php" >
                <input type="text" value="<?php echo $_COOKIE["id"]?>" name ="id" hidden>
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" placeholder="Nom" name="nom" value="<?php echo $_COOKIE["nom"]?>"  id="nom" />
                </div>
                <div class="form-group mt-3">
                    <label for="prenom">Prenom:</label>
                    <input type="text" class="form-control" placeholder="Prenom" value="<?php echo $_COOKIE["prenom"]?>"  name="prenom"  id="prenom"/>

                </div>

                <label for="birth">Date de naissance:</label>
                <input type="date" id="birth" name="date_naissance"
                       min="1900-01-01" max="2021-08-31"
                       value="<?php echo $_COOKIE["date_naissance"]?>"
                >
                <div class="form-group mt-3">
                    <label for="poste">Poste:</label>
                    <input type="text" class="form-control" id="poste" placeholder="poste" value="<?php echo $_COOKIE["poste"]?>"  name="poste"  />
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-warning mt-3" value="Modifier" />
                </div>

        </div>
        </form>


    </div>
    <div>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET["message"])){
                echo "<p class='text-danger'>veuillez remplir correctement les champs</p>";
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


