<?php
    class Category{
        private $id;
        private $nom;
        private $ordreAffichage;

        public function __construct($nom, $ordreAffichage, $id=null){
            $this->id = $id;
            $this->nom = $nom;
            $this->ordreAffichage = $ordreAffichage;
        }

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

        public function setOrdreAffichage($ordre){
            $this->ordreAffichage = $ordre;
        }
    }
?>