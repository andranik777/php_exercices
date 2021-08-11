<?php
include "functions/user-function.php";
CheckUser();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "parts/global-css.php" ?>
    <title>Document</title>
</head>
<body>
<?php
include  "parts/header.php";
?>

<?php


$nom = $email = $prenom = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = test_input($_POST["nom"]);
    $email = $_POST["email"];
    $prenom = test_input($_POST["prenom"]);
    $password = $_POST["password"];

}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

var_dump($_SERVER["PHP_SELF"]);

?>

<?php
session_start();
var_dump($_SESSION);
echo "<h2>Votre saisie:</h2>";
echo $nom;
echo "<br>";
echo $email;
echo "<br>";
echo $prenom;
echo "<br>";
echo $password;

echo "salut ton email est ". $_SESSION["email"]

?>



</body>
</html>


