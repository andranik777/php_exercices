<?php

class ArticleManager extends Database  implements CrudInterface {

    public function findAll()

    {
        try {
            $articles = [];
            $request = $this->bdd->prepare("SELECT * FROM article");
            $request->execute();
            $result = $request->fetchAll();

            foreach ($result as $element) {
                $articles[] = new Article($element["id"], $element["nom"], $element["description"], $element["id_category"], $element["prix"], $element["img"]);
            }

            return $articles;
        }catch (\PDOException $e){
            throw $e;
        }
    }

    public function findOne($id)
    {
        // TODO: Implement findOne() method.
    }

    public function insert($object)
    {
        // TODO: Implement insert() method.
    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }
}


?>