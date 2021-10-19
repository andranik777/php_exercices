<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>body{color: white !important;}</style>
 <?php  include "parts/global-css.php"?>
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">



</head>
<body style="color: black !important;">
<?php include "parts/header.php"?>
<?php
include "functions/password-checker.php";


$formErrors =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["email"]) || empty($_POST["password"])){
        if(empty($_POST["email"])){
            $formErrors[] = "email vide";
        }
        if(empty($_POST["password"])){
            $formErrors[] = "mots de passe vide";
        }
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

        if (strlen($_POST["email"] )<5){
            $formErrors[]= "L'adresse email ou le username non valide";
        }

    }
    if (!passwordValid($_POST["password"]) && $_POST["password"] !="ddechamps")  {
        $formErrors[]= "mots de passe non valide";
    }

    if(count($formErrors)==0) {
        session_start();
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['password'] = $_POST["password"];

        $bdd = new PDO('mysql:host=localhost:3306;dbname=france-football;charset=utf8', 'root', 'Andranik1');

        $reponse = $bdd->prepare('SELECT * FROM user where email = :email or username = :email');


        $reponse->execute(
            [
                "email" => $_POST["email"]
            ]);



        $donnees = $reponse->fetch();


        if (($_SESSION["email"] == $donnees["email"] || $_SESSION["email"] == $donnees["username"] ) && password_verify($_SESSION['password'],$donnees["password"])){

            $_SESSION["id"] = $donnees["id_user"];

            header('Location: index.php');

        }
        else{
            $formErrors[]= "Mots de passe ou email non valide";
        }
    }


}
?>

<div class="container mt-3" >
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="login.php">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="email ou username" name="email">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="password">
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
                <div id="errors">
                    <?php
                    if(count($formErrors) !== 0){
                        foreach ($formErrors as $element ){
                            echo "<p class='text-danger'>$element</p>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="#">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "parts/global-script.php"?>

</body>
</html>