<?php
class CategoryController{
    private $CategoryManager;

    public function __construct()
    {
        $this->categoryManager = new CategoryManager();
    }


    public function listArticle(){
        $articles = $this->categoryManager->selectAll();

        require 'view/article_view.php';
    }

    public function displayOne($id){
        $article = $this->categoryManager->select($id);
        require 'view/detail.php';
    }

    public function addForm()
    {
        require 'View/insert_form.php';
    }

    public function persistForm()
    {
        $article = new Article( $_POST['titre'], $_POST['contenu'], null);
        $this->categoryManager->insert($article);
        header('Location: /correctionMVC/index.php?controller=default&action=home');
    }

    public function delete($id)
    {
        $this->categoryManager->delete($id);
        header('Location: /correctionMVC/index.php?controller=default&action=home');
    }

    public function updateForm($id)
    {
        $article = $this->categoryManager->select($id);

        require 'View/update_form.php';
    }

    public function updateArticle($id)
    {
        $article = $this->categoryManager->select($id);
        $article = new Article($id, $_POST['titre'], $_POST['contenu'], $article->getDateCreation());
        $this->categoryManager->update($article);

        header('Location: /correctionMVC/index.php?controller=default&action=home');
    }
}
