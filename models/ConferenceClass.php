<?php

class Conference
{
    private $titre;
    private $invite;
    private $theme;
    private $date;
    private $synopsis;
    private $heure;
    private $image;
    private $id;
    private $dateCreation;
    private $dateModif;
    private $modifAuth;


    function __construct($titre, $invite, $synopsis, $theme, $date, $heure, $image, $id, $dateCreation, $dateModif, $modifAuth)
    {

        $this->titre = $titre;
        $this->invite = $invite;
        $this->theme = $theme;
        $this->synopsis = $synopsis;
        $this->date = $date;
        $this->heure = $heure;
        $this->image = $image;
        $this->id = $id;
        $this->dateCreation = $dateCreation;
        $this->dateModif = $dateModif;
        $this->modifAuth = $modifAuth;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getInvite()
    {
        return $this->invite;
    }

    public function getSynopsis()
    {
        return $this->synopsis;
    }

    public function getHeure()
    {
        return $this->heure;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getid()
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

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }
    public function setTheme($theme)
    {
        $this->theme = $theme;
        return $this;
    }

    public function setInvite($invite)
    {
        $this->invite = $invite;
        return $this;
    }


    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
        return $this;
    }

    public function setHeure($heure)
    {
        $this->heure = $heure;
        return $this;
    }

    public function setModifAuth($modifAuth)
    {
        $this->modifAuth = $modifAuth;
        return $this;
    }
}
