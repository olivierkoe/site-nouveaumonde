<?php

class Alternative
{
    private $titre;
    private $image;
    private $theme;
    private $email;
    private $site;
    private $id;


    function __construct($titre, $image, $theme, $email, $site, $id)
    {
        $this->titre = $titre;
        $this->image = $image;
        $this->theme = $theme;
        $this->email = $email;
        $this->site = $site;
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
        return $this;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }
}
