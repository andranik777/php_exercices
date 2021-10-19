<html>
<head>
    <?php
    include 'Vue/parts/global-css.php';
    ?>
    <link rel="stylesheet" href="Public/css/login-style.css">
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <h2>Créer un compte</h2>
        <!-- Login Form -->
        <form method="post">
            <input type="text"
                   value="<?php echo((isset($lastSaisie['nom'])) ? $lastSaisie['nom'] : '') ?>"
                   id="nom" class="fadeIn second" name="nom" placeholder="nom">
            <input type="text"
                   value="<?php echo((isset($lastSaisie['email'])) ? $lastSaisie['email'] : '') ?>"
                   id="email"
                   class="fadeIn second" name="email" placeholder="email">
            <input type="text"
                   value="<?php echo((isset($lastSaisie['prenom'])) ? $lastSaisie['prenom'] : '') ?>"
                   id="prenom" class="fadeIn second" name="prenom" placeholder="prenom">
            <input type="text"
                   value="<?php echo((isset($lastSaisie['username'])) ? $lastSaisie['username'] : '') ?>"
                   id="username" class="fadeIn second" name="username" placeholder="username">
            <input type="password" id="password" class="fadeIn second" name="password" placeholder="password">
            <input type="submit"></input>
        </form>


        <?php
        require'Vue/parts/form-error.php';
        ?>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="index.php?controller=security&action=login">Me connecter</a>
        </div>

    </div>
</div>
</body>

<?php
include 'Vue/parts/global-scripts.php';
?>

</html>