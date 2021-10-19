<?php
    // Représentation objet de la table categories de notre BDD
    class Category {
        // Chaque colonne de la BDD sera un attribut privé
        private $id;
        // Chaque colonne de la BDD sera un attribut privé
        private $nom;
        // Chaque colonne de la BDD sera un attribut privé
        private $ordreAffichage;

        // Dans le constructeur, j'irais ajouter chacun de mes attributs.
        // L'id est optionnel. car il est généré par la BDD. On ne le
        // connait pas avant d'insérer
        public function __construct($nom, $ordreAffichage, $id = null){
            $this->id = $id;
            $this->nom = $nom;
            $this->ordreAffichage = $ordreAffichage;
        }

        // Accesseurs / mutateurs pour pouvoir modifier ou accéder à
        // nos attributs privés.

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNom(){
            return $this->nom;
        }

        public function setNom($nom){
            $this->nom = $nom;
        }

        public function getOrdreAffichage(){
            return $this->ordreAffichage;
        }

        public function setOrdreAffichage($ordreAffichage){
            $this->ordreAffichage = $ordreAffichage;
        }
    }
?>