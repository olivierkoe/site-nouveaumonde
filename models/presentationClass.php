<?php

class Presentation
{
    private $titre;
    private $image;
    private $description;
    private $contact;
    private $id;


    function __construct($titre, $image, $description, $contact, $id)
    {
        $this->titre = $titre;
        $this->image = $image;
        $this->description = $description;
        $this->contact = $contact;
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

    public function getDescription()
    {
        return $this->description;
    }

    public function getContact()
    {
        return $this->contact;
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

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }
}
