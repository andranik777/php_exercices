<?php
$bdd = new PDO('mysql:host=localhost:3306;dbname=news_progres;charset=utf8', 'root', 'Andranik1');



if ($_SERVER["REQUEST_METHOD"] == "GET") {


    if(isset($_GET["id_article"])){
        $reponse = $bdd->prepare('DELETE FROM article WHERE id_article = :id_article');
        $reponse->execute(
            [
                "id_article" => $_GET["id_article"]
            ]);
    }


}


    header("Location:index.php?id=1&message=article supprimé");


?>