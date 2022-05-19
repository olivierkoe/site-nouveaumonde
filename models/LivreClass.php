<?php

class Livre
{

    private $image;
    private $titre;
    private $pages;

    function __construct($image, $titre, $pages)
    {

        $this->image = $image;
        $this->titre = $titre;
        $this->pages = $pages;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getPages()
    {
        return $this->pages;
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

    public function setPages($pages)
    {
        $this->pages = $pages;
        return $this;
    }
}
