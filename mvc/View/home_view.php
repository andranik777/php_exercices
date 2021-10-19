<html>
    <head>
        <?php
        include 'Parts/stylesheets.html'
        ?>
    </head>

    <body>
    <div class="container">
    <h1>Welcome to my homepage</h1>

    <a href="../correctionMVC/index.php?controller=article&action=addForm">
        <button style="margin-bottom:10px;" class="btn btn-success">Ajouter un article</button>
    </a>
    <table class="table">
        <thead>
            <td>@Id</td>
            <td>Titre</td>
            <td>Contenu</td>
            <td>Date de création</td>
            <td>Action</td>
        </thead>

        <tbody>
            <?php
                foreach ($articles as $art) {
                    ?>
                    <tr>
                        <td><?php echo $art->getId()?></td>
                        <td><?php echo $art->getTitre()?></td>
                        <td><?php echo $art->getContenu()?></td>
                        <td><?php echo $art->getDateCreation()?></td>
                        <td>
                            <a href="../correctionMVC/index.php?controller=article&action=delete&id=<?php echo $art->getId()?>">Supprimer</a>
                            <a href="../correctionMVC/index.php?controller=article&action=updateForm&id=<?php echo $art->getId()?>">Modifier</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    </div>
    <?php
    include 'Parts/scripts.html'
    ?>
    </body>
</html>