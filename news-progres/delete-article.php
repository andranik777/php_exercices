<?php
$bdd = new PDO('mysql:host=localhost:3306;dbname=animal-store;charset=utf8', 'root', 'Andranik1');



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["id"])){
        $reponse = $bdd->prepare('DELETE FROM article WHERE id = :id');
        $reponse->execute(
            [
                "id" => $_GET["id"]
            ]);
    }

}


if($_GET["category"] == 1){
    header("Location:category.php?id=1&message=article supprimé");

}

if($_GET["category"]==2){
    header("Location:category.php?id=2&message=article supprimé");

}

?>