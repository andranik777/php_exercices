<?php
function displayArticle($reponse) {

    while ($donnees = $reponse->fetch())
    {
        echo '<div class="card text-center" style="width: 18rem;margin-right: 3rem; margin-top: 3rem">';

        echo '<img src="'.$donnees["image"].'" class="card-img-top" >
        <div class="card-body">
        <p>Category: '.$donnees["nom_category"].'</p>
        <p>Autaur: '.$donnees["nom"]. ' '.$donnees["prenom"]. '</p>
        <a href="detail-article.php?id='.$donnees["id_article"].'" class="btn btn-primary">Lire article</a>';

        echo "  </div>
         </div>";
    }
    $reponse->closeCursor(); // Termine le traitement de la requête

}


function ArticleDetail($reponse) {

    while ($donnees = $reponse->fetch())

    {
        echo '<div class="container d-flex justify-content-center" style="margin-top: 5rem">';

        echo '<img src="'.$donnees["image"].'" width="300px" height="300px" class="me-3">
        <div>
        <p>Autaur: '.$donnees["nom"]. ' '.$donnees["prenom"]. '</p>
       <p class="w-50">Description: '.$donnees["description"].'</p>
       <p>Category: '.$donnees["nom_category"].'</p>
               <form method="post" action="article-update.php">
        <input type="text" name="id_article" value="'.$donnees["id_article"].'" hidden>
        <input type="text" name="article_name" value="'.$donnees["article_name"].'" hidden>
        <input type="text" name="description" value="'.$donnees["description"].'" hidden>
        <input type="text" name="id_category" value="'.$donnees["id_category"].'" hidden>
        <input type="text" name="image" value="'.$donnees["image"].'" hidden>
        <input type="submit" value="modifier" class="btn btn-warning mt-3">
        </form>
        <a href="delete-article.php?id_article='.$donnees["id_article"].'" class="btn btn-danger mt-3">Suprimer l\'article</a>
        </div>';

        echo "  </div>
         </div>";
    }
    $reponse->closeCursor(); // Termine le traitement de la requête

}


?>
