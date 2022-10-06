<?php

require "models/AtelierManager.php";
require "GlobalController.php";

class AtelierController
{

    private $atelierManager;

    function __construct()
    {
        $this->atelierManager = new AtelierManager();
        $this->atelierManager->chargementAteliers();
    }

    public function afficherAteliers()
    {
        $listeAteliers = $this->atelierManager->getAtelier();
        require "views/Read/ateliersView.php";
    }

    public function afficherAtelier($id)
    {
        $atelier = $this->atelierManager->getAtelierById($id);
        require "views/Read/atelierView.php";
    }

    public function ajoutAtelier()
    {
        require "views/Create/ajoutAtelierView.php";
    }

    public function ajoutAtelierValidation()
    {
        $resultAjout = $this->atelierManager->ajoutAtelierBD(
            $_POST['titre'],
            $_POST['argument1'],
            $_POST['argument2'],
            $_POST['argument3'],
            $_POST['sourceArg1'],
            $_POST['sourceArg2'],
            $_POST['sourceArg3'],
            $_POST['prix1'],
            $_POST['prix2'],
            $_POST['prix3'],
            $_POST['id'],
            $_POST['image'],
            $_POST['id']
        );
        if (!$resultAjout) {
            throw new Exception("Atelier non ajouter");
        }
        GlobalController::manageErrors("success", "Votre atelier a bien été ajouté");

        header("location: " . URL . "ateliers");
    }

    public function supprimerAtelier($id)
    {
        $atelier = $this->atelierManager->getAtelierById($id);

        $dirImage = $atelier->getImage();
        unlink("public/images/" . $dirImage);
        $this->atelierManager->supprimerAtelierBD($id);

        GlobalController::manageErrors("success", "Votre atelier a bien été supprimé");
        header("location: " . URL . "ateliers");
    }

    public function modifierAtelier($id)
    {
        $ateliers = $this->atelierManager->getAtelierById($id);
        require "views/Update/modifierAtelierView.php";
    }

    public function modifierAtelierValider()
    {
        $atelierInfos = $_POST;

        $atelierImage = $_FILES;

        if ($atelierImage['newImage']['size'] !== 0 && $atelierImage['newImage']['size'] !== $atelierInfos['image']) {
            $imgToAdd = $atelierImage['newImage']['name'];
            $this->atelierManager->modifierAtelierBD(

                $_POST['titre'],
                $_POST['argument1'],
                $_POST['argument2'],
                $_POST['argument3'],
                $_POST['sourceArg1'],
                $_POST['sourceArg2'],
                $_POST['sourceArg3'],
                $_POST['prix1'],
                $_POST['prix2'],
                $_POST['prix3'],
                $_POST['id'],
                $_POST['image'],
                $_POST['id']
            );
            header("location: ../ateliers");
        } else {
            $imgToAdd = $atelierInfos['image'];
            $this->atelierManager->modifierAtelierBD(
                $_POST['titre'],
                $_POST['argument1'],
                $_POST['argument2'],
                $_POST['argument3'],
                $_POST['sourceArg1'],
                $_POST['sourceArg2'],
                $_POST['sourceArg3'],
                $_POST['prix1'],
                $_POST['prix2'],
                $_POST['prix3'],
                $_POST['id'],
                $_POST['image'],
                $_POST['id']
            );
            header("location: ../atelier");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "ateliers");
    }
}
