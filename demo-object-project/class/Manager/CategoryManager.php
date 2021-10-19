<?php
    // Classe qui étend de la classe Database.
    // Elle aura donc accès à son attribut protected $this->bdd
    // Son role sera de transformer les données requêter en objet
    // Elle n'a pas d'attribut mais une fonction pour tous les éléments
    // du CRUD (get one, get all, create, delete, update)
    class CategoryManager extends Database implements CrudInterface {

        // La fonction findAll réccupére tous les éléments de notre DB
        // Elle transforme le tableau retourné par PDO en tableau d'objet
        public function findAll(){
            try {
                // De base nous avons un tableau vide
                $category = [];

                // Comme en PHP nous utilisons PDO pour réccupérer tous nos
                // enregistrements
                $arrayResult = $this->bdd->prepare("SELECT * FROM categories");
                $arrayResult->execute();
                $res = $arrayResult->fetchAll();

                // On parcourt ce tableau
                foreach ($res as $result){
                    // Pour chacune de nos entrées, nous créons un nouvel
                    // objet category (cf: constructeur de Category.php)
                    $category[] = new Category($result['nom'],
                        $result['ordre_affichage'], $result['id']);
                }
            } catch (\PDOException $e){
                // inserer l'exception dans une bdd

            }


            // Nous retournons ce tableau d'objet
            return $category;
        }

        // Ici la fonction findOne prend un id en paramètre
        public function findOne($id){
            $result = null;
            // Nous requêtons notre BDD pour retrouver le bon enregistrement
            // Nous utilisons une requête préparé
            $request = $this->bdd->prepare("SELECT * FROM categories WHERE id = :id");
            $request->execute(['id'=> $id]);
            $result = $request->fetch();

            // Nous transformons le tableau retourné par PDO en objet de
            // type Category
            $category = new Category($result['nom'], $result['ordre_affichage'], $result['id']);

            // Nous retournons cet objet category
            return $category;
        }

        // Cette fonction prend en paramètre un objet category
        // Elle l'insere en base de donnée
        // Nous utiliserons les getteurs / setteurs de notre
        // objet category
        public function insert($category){
            $request = $this->bdd->prepare(
                "INSERT INTO categories (nom, ordre_affichage)
                        VALUE (:nom, :ordre_affichage)");

            $request->execute([
                'nom'=> $category->getNom(),
                'ordre_affichage'=> $category->getOrdreAffichage()
            ]);
        }

        public function update( $category){
            $request = $this->bdd->prepare("UPDATE categories SET 
            nom = :nom, ordre_affichage = :ordre_affichage WHERE id = :id");

            $request->execute([
                'nom'=> $category->getNom(),
                'ordre_affichage' => $category->getOrdreAffichage(),
                'id'=> $category->getId()
            ]);
        }
    }
?>