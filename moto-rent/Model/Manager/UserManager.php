<?php
class UserManager extends Database {
    public function findByEmail($email){
        $requete = $this->bdd->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $requete->execute(['email'=>$email]);
        $resultatsPdo = $requete->fetchAll();
        $resultatObject = $this->transformPdoToArrayObject($resultatsPdo);
        return $resultatObject;
    }

    public function findOneByEmail($email){
        $requete = $this->bdd->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $requete->execute(['email'=>$email]);
        $item = $requete->fetch();
        return new User($item['nom'], $item['prenom'], $item['email'], $item['password'], $item['id']);

    }

    private function transformPdoToArrayObject($resultatsPdo){
        $objectArray = [];
        foreach ($resultatsPdo as $item) {
            $objectArray[] = new User($item['nom'], $item['prenom'], $item['email'], $item['mot_de_passe'], $item['id']);
        }
        return $objectArray;
    }
}
?>