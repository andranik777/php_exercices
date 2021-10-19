<?php
    class DbManager{

        protected $bdd;
        private $host = 'mysql';
        private $dbName = 'forum';
        private $username = 'root';
        private $password = 'tiger';

        public function __construct()
        {
            try {
                $this->bdd = new PDO('mysql:host='.$this->host.'; dbname='. $this->dbName , $this->username, $this->password, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
                $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e) {
                die('Erreur '.$e->getMessage());
            }
        }
    }
?>