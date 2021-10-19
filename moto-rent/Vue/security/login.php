<html>
<head>
    <?php
    include 'Vue/parts/stylesheets.php'
    ?>
</head>
<body>
<div class="container">
    <h1>Login Form</h1>
<!--    Je ne mets pas d'action puisque je souhaite renvoyer l'utilisateur vers la même url
    donc le même controleur et aussi la meme mèthode de controller. L'un appellera avec
    une requête de type get l'autre post    -->
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
