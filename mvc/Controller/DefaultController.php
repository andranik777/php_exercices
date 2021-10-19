<?php
class DefaultController{

    public function home()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();

        $planetManager = new PlanetManager();
        $planets = $planetManager->getAllPlanet();


        require 'View/homepage.php';
    }
}