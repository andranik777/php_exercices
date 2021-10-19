<?php
class PlanetteController {
    private $planetManager;

    public function __construct()
    {
        $this->planetManager = new PlanetManager();
    }

    public function listPlanet(){
        $planets = $this->planetManager->getAllPlanet();
        require 'view/planet_view.php';
    }

    public function displayEditForm($id) {
        $planet = $this->planetManager->getOnePlanet($id);
        require 'view/planet_form_edit.php';
    }

    public function processForm($id) {
        $planet = $this->planetManager->getOnePlanet($id);


        $errors = [];
        if(empty($_POST['allegiance'])){
            $errors[] = 'Erreur : le champ allegiance est requis';
        }

        if(empty($_POST['nom'])) {
            $errors[] = 'Erreur : le champ nom est requis';
        }

        if(!ctype_alpha($_POST['nom'])){
            $errors[] = 'Erreur : Le champ nom ne doit contenir que des lettres';
        }


        if(count($errors) === 0){
            $planet->setNom($_POST['nom']);
            $planet->setAllegiance($_POST['allegiance']);
            $this->planetManager->update($planet);
            header('Location: /correctionMVC/index.php?controller=planet&action=list');
        } else {
            require 'view/planet_form_edit.php';
        }

    }

    public function deletePlanet($id)
    {
        $this->planetManager->deletePlanet($id);
        header('Location: /correctionMVC/index.php?controller=planet&action=list');
    }

    public function displayAddForm()
    {
        require 'view/insert_planet.php';
    }

    public function processFormAjout()
    {
        $insert = true;
        $planet = new Planet( null, $_POST['nom'], $_POST['allegiance']);

        if(isset($_FILES['imagePlanet']) and $_FILES['imagePlanet']['error']!=4){
            var_dump($_FILES);
           $upload =  $this->uploadImage($_FILES['imagePlanet']);

           if(count($upload['errors']) === 0){
               $planet->setImageLink($upload['image']);
           } else {
               $errors = $upload['errors'];
               $insert = false;
               require 'view/insert_planet.php';
           }
        }

        if($insert === true){
            $this->planetManager->insert($planet);
            header('Location: /correctionMVC/index.php?controller=default&action=home');
        }
    }

    private function uploadImage($file){
        $imageUrl= '';
        $errors = [];
        if($file['type'] === 'image/jpeg'){
            if($file['size']<800000){
                $extension = explode('/', $file['type'])[1];
                $imageUrl = uniqid().'.'.$extension;
                move_uploaded_file($file['tmp_name'], 'images/planets/'.$imageUrl);
            } else {
                $errors[] = 'Fichier trop lourd impossible';
            }
        } else {
            $errors[] = 'Impossible : j\'accepte que les JPGS !';
        }

        return ['errors'=>$errors, 'image'=>$imageUrl];
    }


}