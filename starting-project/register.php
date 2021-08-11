<html>
<head>
    <title>Mon super business case</title>

    <link rel="stylesheet" href="public/css/login.css">
    <?php
    include "parts/global-css.php";
    ?>
</head>
<body>
<?php
include "parts/header.php";
?>
<?php

$formErrors =[];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "functions/password-checker.php";

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $formErrors[]= "L'adresse non valide";
    }
    if($_POST["password"] != $_POST["confirm-password"] ){
        $formErrors[]= "Les mots de passes doivent être les mêmes";

    }
    if (!passwordValid($_POST["password"])) {
        $formErrors[]= "mots de passe non valide";
    }

    if(empty($_POST["email"])  || empty($_POST["prenom"])|| empty($_POST["nom"]) || empty($_POST["password"]) || empty($_POST["confirm-password"])){
        if(empty($_POST["email"])){
            $formErrors[] = "email vide";
        }
        if(empty($_POST["password"])){
            $formErrors[] = "mots de passe vide";
        }
        if(empty($_POST["prenom"])){
            $formErrors[] = "prenom  vide";
        }
        if(empty($_POST["nom"])){
            $formErrors[] = "nom  vide";
        }
        if(empty($_POST["confirm-password"])){
            $formErrors[] = "confirmer votre mots de passe";
        }
    }



    if(count($formErrors)==0) {
        session_start();
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['password'] = $_POST["password"];
        $_SESSION['prenom'] = $_POST["prenom"];
        $_SESSION['nom'] = $_POST["prenom"];
        $_SESSION["card"] =0;
        $_SESSION['user'] = [$_POST["email"],$_POST["prenom"],$_POST["prenom"], $_SESSION["card"]];


        header('Location: index.php');
    }


}

?>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <!-- TODO : Ajoutez une jolie image ! -->
        </div>
        <div class="col-md-6 login-form-2">
            <h3>Login for Form 2</h3>
            <form method="POST" action="register.php">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nom" value="" name="nom" />
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Prénom" value="" name="prenom" />
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Email *" value="" name="email" />
                </div>


                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Your Password *" value="" name="password" />
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirmez votre mot de passe" value="" name="confirm-password" />
                </div>


                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="M'enreigistrer" />
                </div>
                <div class="form-group">
                    <?php
                    foreach ($formErrors as $element){
                        echo "<p>$element</p>";
                    }
                    ?>
                </div>


                <div class="form-group">
                    <a href="index.php" class="ForgetPwd">Revenir sur la homepage</a> <br>
                    <a href="login.php">Me connecter</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include "parts/global-script.php";
?>
</body>
</html>
