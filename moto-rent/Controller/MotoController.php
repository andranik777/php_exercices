<?php
// Traite les requêtes envoyées par le point d'entrée (index.php).
// Si besoin, il interroge les données (via les managers)
// Il peut modifier des données
// Il affiche la vue correspondante.
class ArticleController extends AuthenticatedController {

    // Nous avons ici un attribut privé articleManager (il sera initialisé dans le constructeur)
    private $articleManager;
    private $categoryManager;

    public function __construct(){
        parent::__construct();
        // On initialise notre manager en indiquant que notre attribut articleManager
        // est un nouvel objet ArticleManager
        // Ceci implique un import correcte classes.
        $this->articleManager = new ArticleManager();
        $this->categoryManager = new CategoryManager();
    }

    public function list(){
        // On utilise une fonction de notre manager articleManager
        // Cette fonction retourne un tableau d'objet article
        $articles = $this->articleManager->findAll();
        // On inclu la vue qui correspond au listing des articles
        include 'Vue/article-list.php';
    }

    public function detail($id){
        $article = $this->articleManager->findWithCategory($id);
        include 'Vue/article-detail.php';
    }

    public function ajout(){
        $categories = $this->categoryManager->findAll();
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include 'Vue/article-add.php';
        } else {
            // Vérification de l'unicité du nom
            $articleWithName = $this->articleManager->findByNom($_POST['nom']);
            if(count($articleWithName)>0){
                $errors[] = 'Veuillez saisir un nom';
            }

            // Vérification que la categ existe en BDD
            $categId = $_POST['category'];
            $categ = $this->categoryManager->find($categId);
            if(!$categ){
                $errors[] = 'Dégage hackeur !';
            }


            // Vérification du fichier uploadé
            if($_FILES['photo']['size'] == 0){
                $errors[] = 'Veuillez ajouter une photo';
            } else {
                $accepted = ['image/jpeg', 'image/png'];

                if(!in_array($_FILES['photo']['type'], $accepted)){
                    $errors[] = 'Ce type de fichier n\'est pas accepté';
                }

                if($_FILES['photo']['size'] > 1000000) {
                    $errors[] = 'La photo est trop grosse';
                }

                if(count($errors) == 0){
                    $uniqName = 'image_article'.uniqid().'.'.explode("/", $_FILES['photo']['type'])[1];
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'Public/uploads/'.$uniqName);
                    // $name, $quantity, $prix, $photo, $category, $id = null
                    $article = new Article($_POST['nom'], $_POST['quantite'], $_POST['prix'], 'Public/uploads/'.$uniqName, $_POST['category']);
                    $this->articleManager->insert($article);

                    header("Location: index.php?controller=article&action=list");
                }
            }
            include 'Vue/article-add.php';
        }
    }

    public function edit($id){
        $imageFile = null;
        $errors = [];
        $article = $this->articleManager->find($id);
        $categories = $this->categoryManager->findAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include 'Vue/article-edit.php';
        } else {
            $articleWithName = $this->articleManager->findByNom($_POST['nom']);
            if(count($articleWithName) != 0 &&
                $articleWithName[0]->getId() != $article->getId()){
                $errors[] = 'Ce produit existe déjà';
            }

            // Vérification que la categ existe en BDD
            $categId = $_POST['category'];
            $categ = $this->categoryManager->find($categId);

            if(!$categ){
                $errors[] = 'Dégage hackeur !';
            }


            if($_FILES['photo']['size'] == 0 && empty($_FILES['photo']['name'])){
                $imageFile = $article->getPhoto();
            } else {
                if($_FILES['photo']['size'] == 0){
                    $errors[] = 'fichier trop léger';
                }
                $accepted = ['image/jpeg', 'image/png'];

                if(!in_array($_FILES['photo']['type'], $accepted)){
                    $errors[] = 'Ce type de fichier n\'est pas accepté';
                }

                if($_FILES['photo']['size'] > 1000000) {
                    $errors[] = 'La photo est trop grosse';
                }

                $imageFile = 'image_article'.uniqid().'.'.explode("/", $_FILES['photo']['type'])[1];
                move_uploaded_file($_FILES['photo']['tmp_name'], 'Public/uploads/'.$imageFile);
            }

            if(count($errors) == 0){
                $article = new Article($_POST['nom'], $_POST['quantite'], $_POST['prix'], 'Public/uploads/'.$imageFile, $_POST['category'], $id);
                $this->articleManager->update($article);

                header("Location: index.php?controller=article&action=list");
            }



            if(count($errors)>0){
                include 'Vue/article-edit.php';
            }
            echo('Traitement du formulaire');
            die();
        }
    }
}