<?php
class Planet {
    private $id;
    private $nom;
    private $allegiance;
    private $imageLink;


    /**
     * Planet constructor.
     * @param $id
     * @param $nom
     * @param $allegiance
     */
    public function __construct($id = null, $nom = null, $allegiance =  null, $imageLink = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->allegiance = $allegiance;
        $this->imageLink = $imageLink;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param null $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return null
     */
    public function getAllegiance()
    {
        return $this->allegiance;
    }

    /**
     * @param null $allegiance
     */
    public function setAllegiance($allegiance): void
    {
        $this->allegiance = $allegiance;
    }


    /**
     * @return null
     */
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * @param null $imageLink
     */
    public function setImageLink($imageLink): void
    {
        $this->imageLink = $imageLink;
    }

}