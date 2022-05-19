<?php

require "models/LivreManager.php";

class LivreController
{

    private $livreManager;

    function __construct()
    {
        $this->livreManager = new LivreManager();
        $this->livreManager->chargementLivres();
    }

    public function afficherLivres()
    {
        $Biblio = $this->livreManager->getLivre();
        require "views/livresView.php";
    }
}
