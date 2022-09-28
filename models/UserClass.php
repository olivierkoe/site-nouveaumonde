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

    public function __construct($id, $pseudo, $nom, $prenom, $mail, $password, $role)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
        $this->role = $role;
    }

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
}
