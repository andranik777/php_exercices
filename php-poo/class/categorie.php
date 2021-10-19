<?php
class Categorie {
    private $id =3;
    private $nom;
    private $ordre_affichage;

    public function __construct($nom,$ordre_affichage) {
         $this->nom = $nom;
         $this->ordre_affichage = $ordre_affichage;
    }

    function get_id() {
        echo $this->id;

    }
       function get_nom() {
           echo $this->nom;
       }

       function get_ordre_affichage() {
            echo $this->ordre_affichage;
       }
}

?>