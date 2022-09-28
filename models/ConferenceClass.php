<?php

class Conference
{
    private $titre;
    private $theme;
    private $date;
    private $invite;
    private $synopsis;
    private $heure;
    private $image;
    private $id;


    function __construct($titre, $theme, $date, $invite, $synopsis, $heure, $image, $id)
    {

        $this->titre = $titre;
        $this->theme = $theme;
        $this->date = $date;
        $this->invite = $invite;
        $this->synopsis = $synopsis;
        $this->heure = $heure;
        $this->image = $image;
        $this->id = $id;
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
}
