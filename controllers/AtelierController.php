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
        require "views/ateliersView.php";
    }

    public function afficherAtelier($id)
    {
        $atelier = $this->atelierManager->getAtelierById($id);
        require "views/atelierView.php";
    }

    public function ajoutAtelier()
    {
        require "views/ajoutAtelierView.php";
    }

    public function ajoutAtelierValidation()
    {
        $infos = $_FILES['image'];
        $stockImage = "public/images/";
        $saveImage = GlobalController::ajoutImage($_POST['titre'], $infos, $stockImage);
        $resultAjout = $this->atelierManager->ajoutAtelierBD($_POST['titre'], $_POST['materiaux'], $_POST['fabrication'], $_POST['fonctionnement'], $saveImage, $_POST['difficulte'], $_POST['temps'], $_POST['necessite']);
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
        $atelier = $this->atelierManager->getAtelierById($id);
        require "views/modifierView.php";
    }

    public function modifierAtelierValider()
    {
        $atelierInfos = $_POST;

        $atelierImage = $_FILES;

        if ($atelierImage['newImage']['size'] !== 0 && $atelierImage['newImage']['size'] !== $atelierInfos['image']) {
            $imgToAdd = $atelierImage['newImage']['name'];
            $this->atelierManager->modifierAtelierBD($_POST['id'], $atelierInfos['titre'], $atelierInfos['materiaux'], $atelierInfos['fabrication'], $_POST['fonctionnement'], $imgToAdd, $_POST['difficulte'], $_POST['temps'], $_POST['necessite']);
            header("location: ../ateliers");
        } else {
            $imgToAdd = $atelierInfos['image'];
            $this->atelierManager->modifierAtelierBD($_POST['id'], $atelierInfos['titre'], $atelierInfos['materiaux'], $atelierInfos['fabrication'], $_POST['fonctionnement'], $imgToAdd, $_POST['difficulte'], $_POST['temps'], $_POST['necessite']);
            header("location: ../atelier");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "ateliers");
    }
}
