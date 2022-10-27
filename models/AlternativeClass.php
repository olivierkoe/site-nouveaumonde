<?php
// on déclare une class Alternative
class Alternative
{
    // on définis ce qui composse cette class
    private $titre;
    private $image;
    private $theme;
    private $email;
    private $site;
    private $id;
    private $dateCreation;
    private $dateModif;
    private $modifAuth;

    //on construit cette class
    function __construct($titre, $image, $theme, $email, $site, $id, $dateCreation, $dateModif, $modifAuth)
    {
        $this->titre = $titre;
        $this->image = $image;
        $this->theme = $theme;
        $this->email = $email;
        $this->site = $site;
        $this->id = $id;
        $this->dateCreation = $dateCreation;
        $this->dateModif = $dateModif;
        $this->modifAuth = $modifAuth;
    }

    // permet de récuperé le titre de cette class
    public function getTitre()
    {
        return $this->titre;
    }

    // permet de récuperé l'image de cette class
    public function getImage()
    {
        return $this->image;
    }

    // permet de récuperé le thème de cette class
    public function getTheme()
    {
        return $this->theme;
    }

    // permet de récuperé l'amail de cette class
    public function getEmail()
    {
        return $this->email;
    }

    // permet de récuperé l'adresse du site de cette class
    public function getSite()
    {
        return $this->site;
    }

    // permet de récuperé l'id de cette class
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

    // permet de d'affecté un titre à cette class
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    // permet de d'affecté une image à cette class
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    // permet de d'affecté un thème à cette class
    public function setTheme($theme)
    {
        $this->theme = $theme;
        return $this;
    }

    // permet de d'affecté un email à cette class
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    // permet de d'affecté une adresse de site à cette class
    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }

    public function setModifAuth($modifAuth)
    {
        $this->modifAuth = $modifAuth;
        return $this;
    }
}
