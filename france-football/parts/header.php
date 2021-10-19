<?php
    $categories = [
        ["nom"=>"Home",
            "url"=>"index.php"
        ],

        ["nom"=>"Login",
            "url"=>"./login.php"
        ],
        ["nom"=>"Register",
            "url"=>"./register.php"
        ],
        [
            'nom'=> 'Me déconecter',
            'url'=> 'logout.php'
        ],


    ];

    include 'functions/menu-function.php'

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">France Football</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
               <?php displayMenu($categories); ?>
            </div>
        </div>
    </nav>
</header>