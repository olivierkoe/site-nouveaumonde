<?php

class Atelier
{

    private $titre;
    private $temps;
    private $image;
    private $necessite;
    private $id;


    function __construct($titre, $temps, $image, $necessite, $id)
    {

        $this->titre = $titre;
        $this->temps = $temps;
        $this->image = $image;
        $this->necessite = $necessite;
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getTemps()
    {
        return $this->temps;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function getNecessite()
    {
        return $this->necessite;
    }

    public function getid()
    {
        return $this->id;
    }



    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setTemps($temps)
    {
        $this->temps = $temps;
        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function setNecessite($necessite)
    {
        $this->necessite = $necessite;
        return $this;
    }
}
