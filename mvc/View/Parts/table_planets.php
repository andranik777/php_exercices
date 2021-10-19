<h1>Welcome to my homepage</h1>

<a href="../correctionMVC/index.php?controller=planet&action=add">
    <button style="margin-bottom:10px;" class="btn btn-success">Ajouter une planète</button>
</a>
<table class="table">
    <thead>
    <td>@Id</td>
    <td>Nom</td>
    <td>Allegiance</td>
    <td>Image</td>
    <td>Action</td>
    </thead>

    <tbody>
    <?php
    foreach ($planets as $planet) {
        ?>
        <tr>
            <td><?php echo $planet->getId()?></td>
            <td><?php echo $planet->getNom()?></td>
            <td><?php echo $planet->getAllegiance()?></td>
            <td><?php echo((!is_null($planet->getImageLink())? '<img src="images/planets/'.$planet->getImageLink().'" width="100px;"></img>':'Aucune Image')); ?></td>
            <td>
               <a href="index.php?controller=planet&action=displayEditForm&id=<?php echo($planet->getId());?>">Modifier la planète <?php echo($planet->getNom());?></a>
                <a href="index.php?controller=planet&action=delete&id=<?php echo($planet->getId());?>">Supprimer la planète <?php echo($planet->getNom()); ?></a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>