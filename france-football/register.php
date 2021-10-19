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

   if(strlen($_POST["username"]) < 5) {
       $formErrors[]= "Le username doit faire 5 ou plus  de caracteres";
   }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $formErrors[]= "L'adresse email {$_POST["email"]} non valide";
    }
    if($_POST["password"] != $_POST["confirm-password"] ){
        $formErrors[]= "Les mots de passes doivent être les mêmes";

    }

    if (!passwordValid($_POST["password"]) && $_POST["password"] != "ddechamps") {

        $formErrors[]= "mots de passe non valide";
    }

    if(empty($_POST["email"])  || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["confirm-password"])){
        if(empty($_POST["email"])){
            $formErrors[] = "email vide";
        }
        if(empty($_POST["password"])){
            $formErrors[] = "mots de passe vide";
        }
        if(empty($_POST["username"])){
            $formErrors[] = "username  vide";
        }

        if(empty($_POST["confirm-password"])){
            $formErrors[] = "confirmer votre mots de passe";
        }
    }


    if(count($formErrors)==0) {
        $bdd = new PDO('mysql:host=localhost:3306;dbname=france-football;charset=utf8', 'root', 'Andranik1');

        $reponse = $bdd->prepare('INSERT INTO user (username,email,password) 
         VALUES(:username, :email,:password)');
        $reponse->execute(
            [
                "username" => $_POST["username"],
                "email" => $_POST["email"],
                "password" =>   password_hash( $_POST["password"],PASSWORD_BCRYPT)
            ]);

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
            <h3>Register</h3>
            <form method="POST" action="register.php">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" value="" name="username" />
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email *" value="" name="email" />
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
                <div class="form-group mt-3">
                    <?php
                    foreach ($formErrors as $element){
                        echo "<p class='text-danger'>$element</p>";
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
