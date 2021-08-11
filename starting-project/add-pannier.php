<?php
session_start();


// J'initialise une variable panier étant un tableau vide
$panier = [];

// Je vais vérifier si j'ai un panier dans ma session
if(array_key_exists('panier', $_SESSION)){
    // Si j'en ai un je le réccupére en écrasant la variable ligne 3
    $panier = $_SESSION['panier'];
}

// Je déclare une variable à false qui sera mise à true seulement si j'ai déjà ce produit
// dans mon panier
$exist = false;

var_dump($panier);

// Je parcours tout mon tableau
foreach ($panier as $key=>$value){
    // Mon tableau a un élément qui a le nom de produit renvoyé par le formulaire
    // de la page index
    if($value['product'] == $_POST['nom']){
        // J'indique que mon produit était déjà présent
        $exist = true;
        // Je met à jour sa quantité en fonction de la quantité envoyé par le formulaire
        $panier[$key]['quantite'] += $_POST['nb_element'];

    }
}

// Ce produit n'était pas dans mon panier
if($exist == false){
    // J'ajoute un nouveau produit dans mon panier avec les valeurs envoyées par le formulaire
    $panier[] = [
        "product"=> $_POST['nom'],
        "quantite"=> $_POST['nb_element'],
        "price"=> $_POST['price'],
        "description"=> $_POST['description'],
        "image"=> $_POST['image'],
    ];
}

// Je met à jour ma variable de session afin qu'elle ait les derniers éléments modifiés
// ci-dessus
$_SESSION['panier'] = $panier;

// Je redirige mon utilisateur vers la page de listing
header('Location: index.php');
?>
