<?php
class ArticleController{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
    }


    public function listArticle(){
        $articles = $this->articleManager->selectAll();

        require 'view/article_view.php';
    }

    public function displayOne($id){
        $article = $this->articleManager->select($id);
        require 'view/detail.php';
    }

    public function addForm()
    {
        require 'View/insert_form.php';
    }

    public function persistForm()
    {
        $article = new Article( $_POST['titre'], $_POST['contenu'], null);
        $this->articleManager->insert($article);
        header('Location: /correctionMVC/index.php?controller=default&action=home');
    }

    public function delete($id)
    {
        $this->articleManager->delete($id);
        header('Location: /correctionMVC/index.php?controller=default&action=home');
    }

    public function updateForm($id)
    {
        $article = $this->articleManager->select($id);

        require 'View/update_form.php';
    }

    public function updateArticle($id)
    {
        $article = $this->articleManager->select($id);
        $article = new Article($id, $_POST['titre'], $_POST['contenu'], $article->getDateCreation());
        $this->articleManager->update($article);

        header('Location: /correctionMVC/index.php?controller=default&action=home');
    }
}
