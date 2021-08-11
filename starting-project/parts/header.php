<?php
    $categories = [
        ["nom"=>"Home",
            "url"=>"index.php"
        ],
            ["nom"=>"Chien",
                "url"=>"category.php?id=1"
                ],
        ["nom"=>"Chat",
            "url"=>"category.php?id=2"
        ],
        ["nom"=>"Article",
            "url"=>"./article.php"
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
        [
            'nom'=> 'Dark Mode',
            'url'=> 'index.php?mode=dark'
        ],
        [
            'nom'=> 'White Mode',
            'url'=> 'index.php?mode=white'
        ],

    ];

    include 'functions/menu-function.php'

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">PHP Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
               <?php
               displayMenu($categories);

               $nbElement = 0;
               // Ici j'affiche le nombre d'articles complet (nbElement)
                                   if(isset($_SESSION['panier'])){
                                       foreach ($_SESSION['panier'] as $elem){
                                           $nbElement+=$elem['quantite'];
                                       }
                                   }
               // Ici j'affiche le nombre de produit sans prendre en compte la quantité avec un ternaire
               //$nbElement = isset($_SESSION['panier'])?count($_SESSION['panier']):0;


               echo('<a href="panier.php" class="nav-link">Voir mon panier ('.$nbElement.')</a>')
               ?>

            </div>
        </div>
    </nav>
</header>