<?php

class Lowtech
{
    private $id;
    private $image;
    private $titre;
    private $fabrication;
    private $materiaux;
    private $fonctionnement;
    private $difficulte;
    private $temps;
    private $necessite;
    private $source;
    private $imagePrincipe;
    private $dateCreation;
    private $dateModif;
    private $modifAuth;

    function __construct(
        $titre,
        $materiaux,
        $fabrication,
        $fonctionnement,
        $id,
        $image,
        $imagePrincipe,
        $difficulte,
        $temps,
        $necessite,
        $source,
        $dateCreation,
        $dateModif,
        $modifAuth,
    ) {
        $this->id = $id;
        $this->titre = $titre;
        $this->materiaux = $materiaux;
        $this->fabrication = $fabrication;
        $this->fonctionnement = $fonctionnement;
        $this->image = $image;
        $this->imagePrincipe = $imagePrincipe;
        $this->difficulte = $difficulte;
        $this->temps = $temps;
        $this->source = $source;
        $this->necessite = $necessite;
        $this->dateCreation = $dateCreation;
        $this->dateModif = $dateModif;
        $this->modifAuth = $modifAuth;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getImagePrincipe()
    {
        return $this->imagePrincipe;
    }

    public function getFabrication()
    {
        return $this->fabrication;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getMateriaux()
    {
        return $this->materiaux;
    }

    public function getFonctionnement()
    {
        return $this->fonctionnement;
    }

    public function getDifficulte()
    {
        return $this->difficulte;
    }

    public function getTemps()
    {
        return $this->temps;
    }

    public function getNecessite()
    {
        return $this->necessite;
    }

    public function getSource()
    {
        return $this->source;
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

    public function setImagePrincipe($imagePrincipe)
    {
        $this->imagePrincipe = $imagePrincipe;
        return $this;
    }

    public function setFabrication($fabrication)
    {
        $this->fabrication = $fabrication;
        return $this;
    }

    public function setFonctionnement($fonctionnement)
    {
        $this->fonctionnement = $fonctionnement;
        return $this;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setPages($materiaux)
    {
        $this->materiaux = $materiaux;
        return $this;
    }

    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;
        return $this;
    }

    public function setTemps($temps)
    {
        $this->temps = $temps;
        return $this;
    }

    public function setNecessite($necessite)
    {
        $this->necessite = $necessite;
        return $this;
    }

    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    public function setModifAuth($modifAuth)
    {
        $this->modifAuth = $modifAuth;
        return $this;
    }

    public function getSmiley($value)
    {
        $imagemax = $value;
        $image = 0;
        while ($image < $imagemax) {
            echo "<img src=" . URL . "public/images/smile-2.svg alt='smiley' color='green' width='20px';/>";
            $image++;
        }
    }
}
