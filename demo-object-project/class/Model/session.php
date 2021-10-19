<?php
class Session {
    // Les attributs de notre session :
    public $attributs;
// constructeur. Par défaut l'attribut sera vide, et s'il y a des valeurs en session, récupération de ces valeurs:
    public function __construct(){
        $this->attributs= [];
//  Ici cette boucle permet de récupérer les données sauvegarder au moment du destruct de la session. on les récupère et on les réaffecte dans $_SESSION.
        foreach ($_SESSION as $key=>$value){
            $this->attributs[$key] = $value;
        }
    }

    // Fonction appelé implicitement quand on cherche à asigner une valeur à un attribut dont on a pas accès ( privés, inexistant...)
    public function __set($name,$value) {
        $this->attributs[$name] = $value;
    }

    public function __get($name){
        return $this->attributs[$name];
    }
    //Fonction qui affiche l'état de la session
    public function displaySession(){
        var_dump($_SESSION);
        print_r($_SESSION);
        // Moins intéressant car transforme les clés en nombres
        print_r(array_values($this->attributs));
    }
// Sauvegarde notre attribut dans notre session
    public function __destruct(){
        foreach($this->attributs as $key=>$value) {
            $_SESSION[$key] = $value;
// On peut aussi éviter le foreach en écrivant :
            // $_SESSION = $this->attributs  ( et l'inverse plus haut dans le constructeur )
        }
    }
}