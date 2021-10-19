<?php
class Article {

    private $id =3;
    private $nom;
    private $quantite;
    private $prix;
    private $photo;
    private $id_categories;
    private  static  $message ="votre article a été ajouté";

    public function __construct($nom,$quantite,$prix,$photo,$id_categories) {
        $this->nom = $nom;
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->photo = $photo;
        $this->id_categories=$id_categories;

    }


     function get_id() {
         echo  $this->id;

     }
       function get_nom() {
           echo $this->nom;
       }

       function get_quantite() {
           echo $this->quantite;
       }
       function get_photo() {
            echo $this->photo;
        }
      function get_prix() {
        echo $this->prix;
    }
      function get_id_categories() {
          echo $this->id_categories;
      }

      public static function get_message() {
        echo self::$message;
      }
}

?>