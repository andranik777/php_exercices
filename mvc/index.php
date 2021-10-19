<?php
require 'include.php';

if (empty($_GET)) {
    header('Location: index.php?controller=default&action=home');
}
if ($_GET['controller'] === 'default' && $_GET['action'] === 'home') {
    $articleController = new DefaultController();
    $articleController->home();
} else if ($_GET['controller'] === 'article' && $_GET['action'] === 'addForm') {
    $articleController = new ArticleController();
    $articleController->addForm();
} else if ($_GET['controller'] === 'article' && $_GET['action'] === 'addArticle') {
    $articleController = new ArticleController();
    $articleController->persistForm();
} else if ($_GET['controller'] === 'article' && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $articleController = new ArticleController();
    $articleController->delete($_GET['id']);
} else if ($_GET['controller'] === 'article' && $_GET['action'] === 'updateForm' && isset($_GET['id'])) {
    $articleController = new ArticleController();
    $articleController->updateForm($_GET['id']);
} else if ($_GET['controller'] === 'article' && $_GET['action'] === 'updateArticle' && isset($_GET['id'])) {
    $articleController = new ArticleController();
    $articleController->updateArticle($_GET['id']);
} else if ($_GET['controller'] === 'article' && $_GET['action'] === 'displayOne' && isset($_GET['id'])) {
    $articleController = new ArticleController();
    $articleController->displayOne($_GET['id']);
} else if ($_GET['controller'] === 'article' && $_GET['action'] === 'list' ) {
    $articleController = new ArticleController();
    $articleController->listArticle();
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'list' ) {
    $planetController = new PlanetteController();
    $planetController->listPlanet();
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'displayEditForm' && isset($_GET['id'])){
    $planetController = new PlanetteController();
    $planetController->displayEditForm($_GET['id']);
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'processForm' && isset($_GET['id'])){
    $planetController = new PlanetteController();
    $planetController->processForm($_GET['id']);
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'delete' && isset($_GET['id'])){
    $planetController = new PlanetteController();
    $planetController->deletePlanet($_GET['id']);
}

else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'add'){
    $planetController = new PlanetteController();
    $planetController->displayAddForm();
}
else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'processFormAjout'){
    $planetController = new PlanetteController();
    $planetController->processFormAjout();
}


else {
    throw new Exception('La page demandée n\'existe pas', 404);
}
?>