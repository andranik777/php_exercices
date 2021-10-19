<?php
    // classe de connexion à notre BDD.
    // Cette classe est abstraite pour empêcher la création d'un nouvel objet database
    // On l'empêche car seul il ne sert à rien. Il faudra l'hériter pour s'en servir.
    abstract class Database {
        // Attribut qui correspond à notre BDD. Il est initialisé dans le constructeur
        protected $bdd;

        // les attributs de connexion à notre bdd (url, base de donnée, utilisateur, password)
        private $host = 'localhost:3306';
        private $dbName = 'animal-store';
        private $user = 'root';
        private $password = 'Andranik1';

        // Ce constructeur à chaque fois que l'hérite la classe Database et qu'on cré un nouvel objet
        // enfant. Si la classe enfant contient un constructeur, il faudra appeler le constructeur
        // du la classe parent (parent::__construce)
        public function __construct(){
            // J'essaie d'affecter à mon attribut BDD une nouvelle connexion à la BDD
            try {
                // Cas ou tout fonctionne
                $this->bdd = new \PDO('mysql:dbname='.$this->dbName.';charset=utf8;host='.$this->host, $this->user,
                    $this->password);
            } catch (\PDOException $e){
                // Si ca marche pas je lance une erreur PHP
                throw $e;
            }
        }
    }
?>