<?php
// Classe fille de AuthenticatedController
 class CategoryController extends AuthenticatedController {

     private $categManager;

     // Dans le constructeur j'appelle le constructeur parent
     // pour ne pas écraser la fonction en la dupliquant.
     // Dans le constructeur parent, je redirige l'utilisateur si il n'est pas connecté.
     public function __construct(){
         parent::__construct();
        $this->categManager = new CategoryManager();
     }

     public function list(){
         $allCategories = $this->categManager->findAll();

         include 'Vue/category-list.php';
     }

     public function supprimer($id){
         $this->categManager->remove($id);
         header("Location: index.php?controller=category&action=list");
     }

     public function displayForm(){
         // ICI J'AFFICHE MON FORMULAIRE
         // Fait appel à la vue qui contient notre formulaire
        include 'Vue/category-form.php';
     }

     public function submitForm(){
         /*************************************
          *
          *
          * Traitement des erreurs
          *
          */
         $errors = [];

         // On vérifie que le champ nom n'est pas vide
         if(empty($_POST['nom'])){
             $errors[] = 'Veuillez saisir un nom';
         }

         // On vérifie que le champ nom n'est pas vide
         if(empty($_POST['ordre_affichage'])){
             $errors[] = 'Veuillez saisir l\'ordre d\'affichage';
         }

         // On vérifie qu'on a pas déjà un article avec ce nom
         $result = $this->categManager->findByNom($_POST['nom']);
         if(count($result)>0){
             $errors[] = 'Ce nom de categorie n\'est pas dispo';
         }

         // On vérifie que l'ordre d'affichage est disponible
         $result = $this->categManager->findByOrdreAffichage($_POST['ordre_affichage']);
         if(count($result)>0){
             $errors[] = 'Cet ordre d\'affichage n\'est pas dispo';
         }

         /*************************************
          *
          *
          * On a fini de traiter nos erreurs !!!!!
          *
          */


            // Si on a pas d'erreurs on va aller enregistrer en BDD
         if(count($errors) == 0){
             // On cré un objet catégorie
             $categorie = new Category($_POST['nom'], $_POST['ordre_affichage']);
             // On insére l'objet catégorie
             $this->categManager->insert($categorie);
             // On redirige l'utilisateur vers la liste de catégories
             header("Location: index.php?controller=category&action=list&message=success");
         } else {
             // Sinon on raffiche notre formulaire (on aura dans notre vue)
             // la variable errors qui existera il ne restera qu'à l'afficher
             include 'Vue/category-form.php';
         }
     }
 }