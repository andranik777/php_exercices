<html>
<head>
    <title>Mon super business case</title>

    <?php
    include "parts/global-css.php";
    include "functions/user-function.php";
    checkUser();
    ?>
</head>
<body>
<?php
include "parts/header.php";
?>
<div class="container">

    <h1>Mon panier</h1>
    <div class="row">
        <?php

        // J'initialise un panier vide
        $panier = [];

        // Si j'ai un panier en session je le réccupére
        if(array_key_exists('panier', $_SESSION)){
            $panier = $_SESSION['panier'];
        }

        // Si mon panier est vide j'affiche seulement un message qui indique qu'il est vide
        if(count($panier) == 0){
            echo('<h2>Aucun article dans le panier</h2>');
            // Sinon j'affiche un tableau avec tous mes produits
        } else {


            ?>
            <table class="mt-3">
                <thead>
                <td></td>
                <td>Nom du produit</td>
                <td>Quantité</td>
                <td>Prix unitaire</td>
                <td>Prix total</td>
                <td><a href="?delateAll">Tout supprimer</a></td>
                </thead>
                <tbody>


                <?php
                // Pour chacun des éléments de mon panier, je vais afficher une nouvelle ligne
                // avec les infos de mon tableau
                $val = 0;
                foreach ($panier as $elementPanier){

                    echo('<tr>
            <td><img src="'.$elementPanier['image'].'" width="50px" height="50px"></td>
            <td>'.$elementPanier['product'].'</td>
            <td>'.$elementPanier['quantite'].'</td>
             <td>'.$elementPanier['price'].'</td>
             <td>'.$elementPanier['price'] * $elementPanier['quantite'].'</td>
             <td><a href="?delate='.$val.'">Delate</a></td>
             
</tr>');
                    $val++;
                }

                if (isset($_GET["delate"])) {
                    $index = intval($_GET["delate"]);
                    array_splice($_SESSION["panier"],$index,1);

                }

                if (isset($_GET["delateAll"])) {
                    array_splice($_SESSION["panier"],0);

                }

                ?>
                </tbody>

            </table>
            <?php
        }
        ?>
    </div>

    <?php
    include "parts/footer.php";
    ?>
</div>

<?php
include "parts/global-scripts.php";
?>


</body>
</html>
