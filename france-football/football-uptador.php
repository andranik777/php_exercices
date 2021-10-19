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

    if (count($formErrors) == 0) {

        $reponse = $bdd->prepare('UPDATE team 
        SET  prenom = :prenom,
             nom = :nom,
             date_naissance = :date_naissance,
             poste = :poste
     WHERE id = :id ');

        $reponse->execute(
            [   "prenom"=> $_POST["prenom"],
                "nom" => $_POST["nom"],
                "date_naissance" => $_POST["date_naissance"],
                "poste" => $_POST["poste"],
                "id" => $_POST["id"]
            ]);


        header("Location: index.php");

    }

    else {

        header("Location: footballor-update.php?message=veuillez remplir correctement les champs");

    }


}

?>

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
