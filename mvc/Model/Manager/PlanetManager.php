<?php

class PlanetManager extends DbManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPlanet()
    {
        $planets = [];
        $sql = 'SELECT * FROM planet';
        foreach ($this->bdd->query($sql) as $row) {
            $planets[] = new Planet($row['id'], $row['nom'], $row['allegiance'], $row['image_link']);
        }
        return $planets;
    }

    public function getOnePlanet($id)
    {
        $query = $this->bdd->prepare('SELECT * FROM planet WHERE id = :id');
        $query->bindParam('id', $id);
        $query->execute();
        $resultat = $query->fetch();
        $planet = new Planet($resultat['id'], $resultat['nom'], $resultat['allegiance'],  $resultat['image_link']);
        return $planet;
    }

    public function update(Planet $planet)
    {
        $query = $this->bdd->prepare(
            'UPDATE planet SET nom = :nom, allegiance = :allegiance WHERE id=:id');
        $query->execute([
            'nom' => $planet->getNom(),
            'allegiance' => $planet->getAllegiance(),
            'id'=> $planet->getId()
        ]);
    }

    public function deletePlanet($id)
    {
        $query = $this->bdd->prepare('DELETE FROM planet WHERE id = :id');
        $query->execute([
            'id'=>$id
        ]);
    }

    public function insert(Planet $planet)
    {
        $requete = $this->bdd->prepare("INSERT INTO planet (nom, allegiance, image_link) VALUES (?,?, ?)");
        $requete->bindParam(1, $planet->getNom());
        $requete->bindParam(2, $planet->getAllegiance());
        $requete->bindParam(3, $planet->getImageLink());
        $requete->execute();
        $planet->setId($this->bdd->lastInsertId());
    }
}

?>