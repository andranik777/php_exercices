<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>body{color: white !important;}</style>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
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
        $formErrors[]= "L'adresse non valide";
    }
    if (!passwordValid($_POST["password"])) {
        $formErrors[]= "mots de passe non valide";
    }

    if(count($formErrors)==0) {
        session_start();
        if ($_SESSION["email"] == $_POST["email"] && $_SESSION["password"] == $_POST["password"]){
            header('Location: index.php');

        }
        else{
            $formErrors[]= "Mots de passe ou email non valide";
        }
    }


}
?>

<div class="container " style="margin-top: 4rem">
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
                        <input type="text" class="form-control" placeholder="email" name="email">

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
                            echo "<p>$element</p>";
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





</body>
</html>