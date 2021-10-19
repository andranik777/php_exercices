<?php
    class ArticleManager extends DbManager {
        public function __construct()
        {
            parent::__construct();
        }

        public function selectAll()
        {
            $articles = [];
            $sql =  'SELECT * FROM article ORDER BY date_creation';

            foreach  ($this->bdd->query($sql) as $row) {
                $articles[] = new Article( $row['titre'], $row['contenu'], $row['date_creation'], $row['id']);
            }


            return $articles;
        }

        public function insert(Article $article)
        {

            $titre = $article->getTitre();
            $contenu = $article->getContenu();
            $dateCreation = $article->getDateCreation();
            $requete = $this->bdd->prepare("INSERT INTO article (titre, contenu, date_creation) VALUES (?,?,?)");
            $requete->bindParam(1, $titre);
            $requete->bindParam(2, $contenu);
            $requete->bindParam(3, $dateCreation);
            $requete->execute();
            $article->setId($this->bdd->lastInsertId());
        }

        public function delete($id)
        {
            $requete = $this->bdd->prepare("DELETE FROM article where id = ?");
            $requete->bindParam(1,$id);
            $requete->execute();
        }

        public function select($id)
        {
            $requete = $this->bdd->prepare("SELECT * FROM article WHERE id=?");
            $requete->bindParam(1, $id);
            $requete->execute();
            $res = $requete->fetch();
            $article = new Article( $res['titre'], $res['contenu'], $res['date_creation'],$res['id']);
            return $article;
        }

        public function update(Article $article)
        {
            $titre = $article->getTitre();
            $contenu = $article->getContenu();
            $dateCreation = $article->getDateCreation();
            $id = $article->getId();
            $requete = $this->bdd->prepare("UPDATE  article SET titre =?, contenu = ?, date_creation = ? WHERE id = ?");
            $requete->bindParam(1, $titre);
            $requete->bindParam(2, $contenu);
            $requete->bindParam(3, $dateCreation);
            $requete->bindParam(4, $id);
            $requete->execute();
        }

    }
?>