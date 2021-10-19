<?php
    // C'est une classe abstraite (on ne pourra jamais faire de new Database)
    // Toutes les classes qui en héritent seront donc connecté à ma BDD
    abstract class Database {
        // Nous avons ici un attribut BDD qui sera mis à jour dans le constructeur
        // de ma classe. Il a une visibilité protected car nous aurons besoin
        // de cet attribut dans les classes qui en hériteront
        protected $bdd;

        // Mes attributs privés qui seront les infos de connexion à ma BDD
        private $url = 'database';
        private $identifiant = 'root';
        private $password = 'tiger';
        private $dbName = 'business-case';

        // Dans mon constructeur, je me connecte à ma DB je stoque cette
        // connexion dans mon attribut partagé bdd
        public function __construct(){
            try {
                $this->bdd = new PDO(
                    'mysql:host='.$this->url.';dbname='.$this->dbName.';charset=utf8',
                    $this->identifiant,
                    $this->password);
            } catch (\PDOException $e){
                throw $e;
            }

        }
    }
?>