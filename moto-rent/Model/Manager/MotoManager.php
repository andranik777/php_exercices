<?php

// Classe fille de la classe Database. Elle reprendra les éléments de la classe parente.
// Nous aurons donc accès à l'attribut protecte bdd contenu dans cette classe
// Elle transforme des requêtes SQL en fonction de l'action demandée
// et retourne des objets ou tableau d'objet ou null
class ArticleManager extends Database {


    // Elle réccupéte tous nos articles et les retourne sous forme de tableau
    public function findAll(){
        // On prépare une requête qui selectionne tous nos articles
        // On utilise bien l'attribut bdd de la classe Database (héritage)
        $requete = $this->bdd->prepare("SELECT * FROM article");
        // On execute notre requête
        $requete->execute();
        // On réccupére ici les resultats sous forme de tableau de tableau
        $resultats = $requete->fetchAll();

        // On cré un tableau d'objet
        // On stockera dedans tous les tableaux de tableau de notre bdd sous forme de tableau d'objet
        $arrayObjectResult = [];

        foreach ($resultats as $result){
            // Pour chaque résultat on ajoute un nouvel objet Article dans notre tableau d'objet
            $arrayObjectResult[] = new Article($result['name'], $result['quantite'], $result['prix'], $result['photo'], $result['id_categories'], $result['id']);
        }

        // On oublie le return pour pouvoir stocker le résultat de la mèthode dans une variable
        return $arrayObjectResult;
    }

    public function find($id){
        // On prépare une requête avec un paramètre (id)
        $requete = $this->bdd->prepare("SELECT * FROM article WHERE id = :id");
        // Je lie le paramètre id (:id) de ma requête avec la variable $id passé en parametre
        $requete->execute(['id'=> $id]);

        // Il me retourne un tableau clé => valeur contenant mon resultat
        $res = $requete->fetch();

        // Je transforme mon tableau clé => valeur en objet
        $article = new Article($res['name'], $res['quantite'], $res['prix'], $res['photo'], $res['id_categories'], $res['id']);

        // Je retourne l'objet que j'ai créé
        return $article;
    }

    public function findWithCategory($id){
        $requete = $this->bdd->prepare("SELECT * FROM article 
    JOIN categories ON article.id_categories = categories.id  WHERE article.id = :id");
        // Je lie le paramètre id (:id) de ma requête avec la variable $id passé en parametre
        $requete->execute(['id'=> $id]);
        $resultat = $requete->fetch();
        $category = new Category($resultat['nom'], $resultat['ordre_affichage'], $resultat['id_categories']);

        $article = new Article($resultat['name'], $resultat['quantite'], $resultat['prix'], $resultat['photo'], $category, $resultat[0]);

        return $article;
    }

    public function findByNom($nom){
        $requete = $this->bdd->prepare("SELECT * FROM article WHERE name = :name ");
        $requete->execute(['name'=> $nom]);
        $resultats = $requete->fetchAll();
        $arrayObjectResult = [];
        foreach ($resultats as $result){

            $arrayObjectResult[] = new Article($result['name'], $result['quantite'], $result['prix'], $result['photo'], $result['id_categories'], $result['id']);
        }
        return $arrayObjectResult;
    }

    public function insert(Article $article){
        try{
            $requete = $this->bdd->prepare(
                "INSERT INTO article (name, quantite, prix, photo, id_categories)
                    VALUE (:name, :quantite, :prix, :photo, :id_categories)");

            $requete->execute([
                'name'=> $article->getName(),
                'quantite'=> $article->getQuantity(),
                'prix'=> $article->getPrix(),
                'photo'=> $article->getPhoto(),
                'id_categories' => $article->getCategory()
            ]);
        } catch (\PDOException $e){
            var_dump($e);
            die();
        }

    }

    public function update(Article $article){
        try {
            $requete = $this->bdd->prepare("UPDATE article SET
        name = :name, quantite = :quantite, prix = :prix, photo = :photo, id_categories = :idCat
        WHERE id = :id");

            $requete->execute([
                'name'=> $article->getName(),
                'quantite'=> $article->getQuantity(),
                'prix'=> $article->getPrix(),
                'photo'=> $article->getPhoto(),
                'idCat'=> $article->getCategory(),
                'id'=> $article->getId()
            ]);
        } catch (\PDOException $e){
            throw $e;
        }

    }
}