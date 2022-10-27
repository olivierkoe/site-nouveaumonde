<?php

class User
{
    private $id;
    private $pseudo;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $role;
    private $image;
    private $dateCreation;
    private $dateModif;
    private $modifAuth;

    public function __construct($id, $pseudo, $nom, $prenom, $mail, $password, $role, $image, $dateCreation, $dateModif, $modifAuth)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
        $this->role = $role;
        $this->image = $image;
        $this->dateCreation = $dateCreation;
        $this->dateModif = $dateModif;
        $this->modifAuth = $modifAuth;
    }

    // GET 
    /**
     * Get the value of id
     */
    public function getId()
    {
        return htmlspecialchars($this->id);
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return htmlspecialchars($this->pseudo);
    }

    /**
     * Get the value of pseudo
     */
    public function getNom()
    {
        return htmlspecialchars($this->nom);
    }

    /**
     * Get the value of pseudo
     */
    public function getPrenom()
    {
        return htmlspecialchars($this->prenom);
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return htmlspecialchars($this->mail);
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return htmlspecialchars($this->password);
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return htmlspecialchars($this->role);
    }

    public function getImage()
    {
        return htmlspecialchars($this->image);
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


    // SET

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function setModifAuth($modifAuth)
    {
        $this->modifAuth = $modifAuth;
        return $this;
    }
}
