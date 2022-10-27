<?php

class Partenaire
{
    private $titre;
    private $description;
    private $id;
    private $image;
    private $siteWeb;
    private $email;
    private $dateCreation;
    private $dateModif;
    private $modifAuth;

    function __construct($titre, $description, $id, $image, $siteWeb, $email, $dateCreation, $dateModif, $modifAuth)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->siteWeb = $siteWeb;
        $this->email = $email;
        $this->image = $image;
        $this->dateCreation = $dateCreation;
        $this->dateModif = $dateModif;
        $this->modifAuth = $modifAuth;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function getDateModif()
    {
        return $this->dateModif;
    }

    public function getModifAuth()
    {
        return $this->modifAuth;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setModifAuth($modifAuth)
    {
        $this->modifAuth = $modifAuth;
        return $this;
    }
}
