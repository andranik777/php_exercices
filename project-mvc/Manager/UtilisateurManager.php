<?php
class UtilisateurManager extends Database implements CrudInterface
{

    public function findByUsername($username)
    {
        $request = $this->bdd->prepare("
SELECT * FROM user WHERE username = :username");
        $request->execute(['username' => $username]);
        $result = $request->fetch();
        $user = new Utilisateur($result['nom'], $result['prenom'],
            $result['username'], $result['password'], $result['id']);

        return $user;
    }

    public function findAll(){

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