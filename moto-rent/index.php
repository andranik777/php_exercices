<?php
// Porte d'entrée de l'application
// Il ne contiendra jamais de HTML
// On retrouvera toutes les routes de notre application
// En fonction des paramètres GET envoyés on oriente
// la requête vers nos controlleurs

require 'autoload.php';

// On vérifie qu'il y a bien un paramètre GET controller dans notre url
// On choisit ici ou sera envoyé l'utilisateur sans paramètre GET
// index.php index.php?action=test
if (!isset($_GET['controller'])) {
    header('Location: index.php?controller=category&action=list');
}

// On regarde en fonction de nos paramètres GET quel controlleur
// nous devons appeler
if ($_GET['controller'] == 'category') {
    // On cré un nouvel objet CategoryController
    // On y retrouvera essentiellement des fonctions tous les traitements
    // de nos requêtes liées aux catégories
    $controller = new CategoryController();

    if ($_GET['action'] == 'list') {
        // J'appelle la mèthode list de mon controlleur CategoryController
        $controller->list();
    }

    // Idem que la ligne 25
    // En plus nous vérifions qu'on a bien un ID (identifiant de la ressource à supprimer)
    if ($_GET['action'] == 'supprimer' && isset($_GET['id'])) {
        // On appel la fonction supprimer de notre controller (ligne 29)
        // En lui passant en paramètre l'id que l'on veut supprimer
        $controller->supprimer($_GET['id']);
    }

    // Check de l'url si on a le pramètre GET action égal à displayForm
    if ($_GET['action'] == 'displayForm') {
       // Je vais appeler la mèthode displayForm de mon controlleur
        // Elle affichera la vue de mon formulaire
        $controller->displayForm();
    }

    // Ici nous sommes dans le cas ou le formulaire a été soumis
    // Elle prendra en charge le traitement de notre formulaire
    if ($_GET['action'] == 'submitForm') {
       // On appelle la fonction submitForm de notre controller
        $controller->submitForm();
    }


}

if($_GET['controller'] == 'article'){
    $controller = new ArticleController();
    if($_GET['action'] == 'list'){
        $controller->list();
    }
    if($_GET['action'] == 'detail' && isset($_GET['id'])){
        $controller->detail($_GET['id']);
    }
    if($_GET['action'] == 'ajout'){
        $controller->ajout();
    }

    if($_GET['action'] == 'edit' && isset($_GET['id'])){
        $controller->edit($_GET['id']);
    }
}

// On check dans notre index la valeur de l'attribut controller
// security. Si c'est le cas on appellera le controller security
// controller. Il permettra de gérer le register et le login
if($_GET['controller'] == 'security'  ){
        $controller = new SecurityController();
        // Si on souhaite se connecter, on ajoutera
        // la valeur get action = login
        if($_GET['action'] == 'login'){
            // On appel la fonction login de notre controller
            $controller->login();
        }
}