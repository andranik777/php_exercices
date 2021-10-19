<?php
class CategoryManager extends Database {

    public function find($id){
        $request = $this->bdd->prepare("SELECT * FROM categories WHERE id = :id");
        $request->execute(['id'=> $id]);
        $result = $request->fetch();

        if($result){
            return new Category($result['nom'], $result['ordre_affichage'], $result['id']);
        } else {
            return  null;
        }

    }

    public function findAll(){
       $request = $this->bdd->prepare("SELECT * FROM categories");
       $request->execute();
       $result = $request->fetchAll();

       $arrayCategories = $this->transformArrayResultToArrayObject($result);

       return $arrayCategories;
    }

    public function findByNom($nom){
        $request = $this->bdd->prepare(
            "SELECT * FROM categories WHERE nom = :nom");
        $request->execute(['nom'=> $nom]);

        $result = $request->fetchAll();

        $arrayCategories = $this->transformArrayResultToArrayObject($result);

        return $arrayCategories;
    }

    public function findByOrdreAffichage($ordre){
        $request = $this->bdd->prepare(
            "SELECT * FROM categories WHERE ordre_affichage = :ordre_affichage");
        $request->execute(['ordre_affichage'=> $ordre]);

        $result = $request->fetchAll();

        $arrayCategories = $this->transformArrayResultToArrayObject($result);

        return $arrayCategories;
    }

    public function remove($id){
        $request = $this->bdd->prepare("DELETE FROM categories WHERE id = :id");
        $request->execute([':id'=> $id]);
    }

    public function insert(Category $category){
        try{
        $request = $this->bdd->prepare("INSERT INTO categories (nom, ordre_affichage)
        VALUE (:nom, :ordre_affichage)");

        $request->execute(['nom'=> $category->getNom(), 'ordre_affichage'=> $category->getOrdreAffichage()]);
        } catch (\PDOException $e){
            throw $e;
        }
    }

    private function transformArrayResultToArrayObject($arrayOfArray){
        $arrayCategories = [];

        foreach ($arrayOfArray as $elem){
            $arrayCategories[] = new Category($elem["nom"], $elem['ordre_affichage'], $elem["id"]);
        }

        return $arrayCategories;
    }
}