<?php
class Utilisateur {
    private $id= 2;
    private $nom;
    private $prenom;
    private $username;
    private $mot_de_passe;

    public function __construct($nom,$prenom,$username,$mot_de_passe) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->username = $username;
        $this->mot_de_passe = $mot_de_passe;
    }

     function get_id() {
         echo $this->id;

     }
       function get_nom() {
           echo $this->nom;
       }

       function get_prenom() {
           echo $this->prenom;
       }
        function get_username() {
            echo $this->username;
        }
      function get_mot_de_passe() {
          echo $this->mot_de_passe;
      }
}

?>