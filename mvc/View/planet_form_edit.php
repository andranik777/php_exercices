<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>
<div class="container">
    <h1>Mise à jour de la planète <?php echo($planet->getNom()); ?></h1>

    <a href="../correctionMVC/index.php?controller=default&action=home">
        <button style="margin-bottom:10px;" class="btn btn-success">Revenir en arrière</button>
    </a>

    <form method="post" action="index.php?controller=planet&action=processForm&id=<?php echo $planet->getId(); ?>">
        <label>Nom de la planète</label>
        <input name="nom" value="<?php echo($planet->getNom()); ?>" class="form-control">

        <label>Allegiance de la planète</label>
        <input name="allegiance" value="<?php echo($planet->getAllegiance()); ?>" class="form-control">

        <input class="btn btn-success" type="submit" value="valider">
    </form>

    <?php
    if (isset($errors)) {
        echo('<h2 style="color: red">Les erreurs !!!!!!</h2>
<ol>');
        foreach ($errors as $error) {
            echo('<li>' . $error . '</li>');
        }
        echo('</ol>');
    }
    ?>
</div>
<?php
include 'Parts/scripts.html'
?>
</body>