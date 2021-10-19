<?php
    // Création de la classe catégorie.
    // Cette classe est la représentation objet de notre BDD


    require 'class/Model/Category.php';
    require 'class/Model/Utilisateur.php';
    // Cette classe permet de se connecter à notre DB. C'est une classe abstraite
    // On ne pourra pas l'instancier mais des classes pourront en hériter
    require 'class/Model/Database.php';
   // Cette classe permettra d'interroger notre serveur MySQL et de retourner
   // des objets

    require 'interfaces/CrudInterface.php';

    require 'class/Manager/UtilisateurManager.php';
    require 'class/Manager/CategoryManager.php';

    // Je cré un nouvel objet categManager pour pouvoir
    // appelé les fonctions qui sont dans cette classe
    $categManager = new CategoryManager();
    // Je reccupére la catégorie 1

    $utilisateurManager = new UtilisateurManager();

    var_dump($utilisateurManager->findByUsername("aurelien"));