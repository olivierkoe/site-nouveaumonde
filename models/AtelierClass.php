<?php

class Atelier
{

    private $titre;
    private $argument1;
    private $sourceArg1;
    private $prix1;
    private $argument2;
    private $sourceArg2;
    private $prix2;
    private $argument3;
    private $sourceArg3;
    private $prix3;
    private $id;
    private $dateCreation;
    private $dateModif;
    private $modifAuth;


    function __construct($titre, $argument1, $argument2, $argument3,  $sourceArg1, $sourceArg2, $sourceArg3, $prix1, $prix2, $prix3, $id, $dateCreation, $dateModif, $modifAuth)
    {

        $this->titre = $titre;
        $this->argument1 = $argument1;
        $this->sourceArg1 = $sourceArg1;
        $this->prix1 = $prix1;
        $this->argument2 = $argument2;
        $this->sourceArg2 = $sourceArg2;
        $this->prix2 = $prix2;
        $this->argument3 = $argument3;
        $this->sourceArg3 = $sourceArg3;
        $this->prix3 = $prix3;
        $this->id = $id;
        $this->dateCreation = $dateCreation;
        $this->dateModif = $dateModif;
        $this->modifAuth = $modifAuth;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getArgument1()
    {
        return $this->argument1;
    }

    public function getArgument2()
    {
        return $this->argument2;
    }

    public function getArgument3()
    {
        return $this->argument3;
    }

    public function getsourceArg1()
    {
        return $this->sourceArg1;
    }

    public function getsourceArg2()
    {
        return $this->sourceArg2;
    }

    public function getsourceArg3()
    {
        return $this->sourceArg3;
    }

    public function getPrix1()
    {
        return $this->prix1;
    }

    public function getPrix2()
    {
        return $this->prix2;
    }

    public function getPrix3()
    {
        return $this->prix3;
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

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setArgument1($argument1)
    {
        $this->argument1 = $argument1;
        return $this;
    }

    public function setArgument2($argument2)
    {
        $this->argument2 = $argument2;
        return $this;
    }

    public function setArgument3($argument3)
    {
        $this->argument3 = $argument3;
        return $this;
    }

    public function setSourceArg1($sourceArg1)
    {
        $this->sourceArg1 = $sourceArg1;
        return $this;
    }
    public function setSourceArg2($sourceArg2)
    {
        $this->sourceArg2 = $sourceArg2;
        return $this;
    }

    public function setSourceArg3($sourceArg3)
    {
        $this->sourceArg3 = $sourceArg3;
        return $this;
    }

    public function setPrix1($prix1)
    {
        $this->prix1 = $prix1;
        return $this;
    }

    public function setPrix2($prix2)
    {
        $this->prix2 = $prix2;
        return $this;
    }

    public function setPrix3($prix3)
    {
        $this->prix3 = $prix3;
        return $this;
    }

    public function setModifAuth($modifAuth)
    {
        $this->modifAuth = $modifAuth;
        return $this;
    }
}
