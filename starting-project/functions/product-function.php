<?php


function displayProduct($array){
    /*Ici, j'ai ajouté un formulaire avec des inputs hidden afin d'envoyer via la mèthode
      post les différents informations à ajouté au panier. Ces informations sont
      envoyés à la page add-pannier.php
    */
    foreach ($array as $product){
    echo('<div class="card" style="width: 18rem;margin: 3rem 3rem 0 0;">
  <div class="card-body">
    <h5 class="card-title">'.$product['nom'].'</h5>
      <img class="card-img-top" src="'.$product["image"].'" alt="Card image cap">
          <p class="card-text">'.$product["description"].'</p>
    <h6 class="card-subtitle mb-2 text-muted">'.$product['prix'].' euros</h6>
    <form action="add-pannier.php" method="post">
        <input name="nom" value="'.$product['nom'].'" hidden>
        <input name="price" value="'.$product['prix'].'" hidden>
        <input name="image" value="'.$product['image'].'" hidden>
        <input name="description" value="'.$product['description'].'" hidden>
        <label>Quantité</label>
        <input type="number" name="nb_element" value="1">
        <button type="submit" class="card-link">Ajouter au panier</button>
    </form>

  </div>
</div>');
    }
}
?>