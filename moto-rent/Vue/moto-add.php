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
            <input name="nom" type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrez le nom du produit">
        </div>
        <div class="form-group">
            <label for="quantite">Quantité</label>
            <input name="quantite" type="number" class="form-control" id="quantite" aria-describedby="quantiteHelp" placeholder="Entrez la quantité">
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input step="0.01" name="prix" type="number" class="form-control" id="prix" aria-describedby="prixHelp" placeholder="Entrez la prix">
        </div>

        <div class="form-group">
            <label for="category">Catégorie</label>
            <select class="form-control" id="category" name="category">
                <?php
                foreach ($categories as $category){
                    echo('<option value="'.$category->getId().'">'.$category->getNom().'</option>');
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
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
