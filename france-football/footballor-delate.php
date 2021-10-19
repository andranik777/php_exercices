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



if ($_SERVER["REQUEST_METHOD"] == "GET") {


    if(isset($_GET["id"])){
        $reponse = $bdd->prepare('DELETE FROM team WHERE id = :id');
        $reponse->execute(
            [
                "id" => $_GET["id"]
            ]);
    }

}

    header("Location:index.php?id=1&message=Le joueur viens d'être supprimé de l'equipe");


?>