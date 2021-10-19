<?php
    class Article{
        private $id;
        private $titre;
        private $contenu;
        private $date_creation;

        /**
         * @return null
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param null $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getTitre()
        {
            return $this->titre;
        }

        /**
         * @param mixed $titre
         */
        public function setTitre($titre): void
        {
            $this->titre = $titre;
        }

        /**
         * @return mixed
         */
        public function getContenu()
        {
            return $this->contenu;
        }

        /**
         * @param mixed $contenu
         */
        public function setContenu($contenu): void
        {
            $this->contenu = $contenu;
        }

        /**
         * @return mixed
         */
        public function getDateCreation()
        {
            return $this->date_creation;
        }

        /**
         * @param mixed $date_creation
         */
        public function setDateCreation($date_creation): void
        {
            $this->date_creation = $date_creation;
        }

        /**
         * Article constructor.
         * @param $id
         * @param $titre
         * @param $contenu
         * @param $date_creation
         */
        public function __construct( $titre, $contenu, $date_creation = null, $id = null)
        {
            $this->id = $id;
            $this->titre = $titre;
            $this->contenu = $contenu;
            $this->date_creation = null;
            if(is_null($date_creation)){
                $this->date_creation = date('Y-m-d');
            } else {
                $this->date_creation = $date_creation;
            }
        }
    }
?>