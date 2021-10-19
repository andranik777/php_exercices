<?php
// Pour éviter la duplication de code
// Classe abstraite elle ne s'instancie pas
// Elle servira pour les classes qui en héritent
// Nous ferons donc hériter toutes les classes nécessitant une authentification
// de cette classe
abstract class AuthenticatedController{
    public $user;

    public function __construct(){
        // Si il n'y a pas d'utilisateurs connectés, je renvoies vers la page de login
        if(!isset($_SESSION['utilisateur'])){
            header('Location: index.php?controller=security&action=login');
        } else {
            $this->user = unserialize($_SESSION['utilisateur']);
        }
    }
}