<?php
    class Article{
        private $id;
        private $name;
        private $quantity;
        private $prix;
        private $photo;
        private $category;

        public function __construct($name, $quantity, $prix, $photo, $category, $id = null)
        {
            $this->id = $id;
            $this->name = $name;
            $this->quantity = $quantity;
            $this->prix = $prix;
            $this->photo = $photo;
            $this->category = $category;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getQuantity()
        {
            return $this->quantity;
        }

        /**
         * @param mixed $quantity
         */
        public function setQuantity($quantity): void
        {
            $this->quantity = $quantity;
        }

        /**
         * @return mixed
         */
        public function getPrix()
        {
            return $this->prix;
        }

        /**
         * @param mixed $prix
         */
        public function setPrix($prix): void
        {
            $this->prix = $prix;
        }

        /**
         * @return mixed
         */
        public function getPhoto()
        {
            return $this->photo;
        }

        /**
         * @param mixed $photo
         */
        public function setPhoto($photo): void
        {
            $this->photo = $photo;
        }

        /**
         * @return mixed
         */
        public function getCategory()
        {
            return $this->category;
        }

        /**
         * @param mixed $category
         */
        public function setCategory($category): void
        {
            $this->category = $category;
        }


    }
?>