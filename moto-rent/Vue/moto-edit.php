<html>
<head>
    <?php
    include 'Vue/parts/stylesheets.php'
    ?>
</head>
<body>
<div class="container">
    <?php
    include 'Vue/parts/header.php';
    ?>
    <h1>Ajout d'article</h1>
    <!--    Je ne mets pas d'action puisque je souhaite renvoyer l'utilisateur vers la même url
        donc le même controleur et aussi la meme mèthode de controller. L'un appellera avec
        une requête de type get l'autre post    -->
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input value="<?php echo($article->getName()) ?>" name="nom" type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrez le nom du produit">
        </div>
        <div class="form-group">
            <label for="quantite">Quantité</label>
            <input value="<?php echo($article->getQuantity()) ?>" name="quantite" type="number" class="form-control" id="quantite" aria-describedby="quantiteHelp" placeholder="Entrez la quantité">
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input value="<?php echo($article->getPrix()) ?>" step="0.01" name="prix" type="number" class="form-control" id="prix" aria-describedby="prixHelp" placeholder="Entrez la prix">
        </div>

        <div class="form-group">
            <label for="category">Catégorie</label>
            <select class="form-control" id="category" name="category">
                <?php
                foreach ($categories as $category){
                    if($category->getId() == $article->getCategory()){
                        echo('<option selected value="'.$category->getId().'">'.$category->getNom().'</option>');
                    } else {
                        echo('<option value="'.$category->getId().'">'.$category->getNom().'</option>');
                    }

                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <img src="<?php echo($article->getPhoto());?>" alt="photo produit">
            <label for="photo">Photo (Uploadez une nouvelle pour mettre à jour)</label>
            <input type="file" name="photo">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    /* Fichier "template" a appeler sur tous mes formulaires pour afficher
     * les erreurs
     */
    include 'Vue/parts/errors-form.php';
    ?>
</div>
</body>
</html>
