<?php

require "models/AlternativeManager.php";

class AlternativeController
{

    private $alternativeManager;

    function __construct()
    {
        $this->alternativeManager = new AlternativeManager();
        $this->alternativeManager->chargementAlternatives();
    }

    public function afficherAlternatives()
    {
        $listealternatives = $this->alternativeManager->getAlternative();
        require "views/alternativesView.php";
    }

    public function afficherAlternative($id)
    {
        $alternative = $this->alternativeManager->getAlternativeById($id);
        require "views/alternativeView.php";
    }

    public function ajoutAlternative()
    {
        require "views/ajoutAlternativeView.php";
    }

    public function ajoutAlternativeValidation()
    {
        $infos = $_FILES['image'];
        $stockImage = "public/images/alternatives/";
        $saveImage = GlobalController::ajoutImage($_POST['titre'], $infos, $stockImage);
        $resultAjout = $this->alternativeManager->ajoutAlternativeBD($_POST['titre'], $_POST['theme'], $saveImage);
        if (!$resultAjout) {
            throw new Exception("Alternative non ajouter");
        }
        GlobalController::manageErrors("success", "Votre alternative a bien été ajouté");

        header("location: " . URL . "alternatives");
    }

    public function supprimerAlternative($id)
    {
        $alternative = $this->alternativeManager->getAlternativeById($id);

        $this->alternativeManager->supprimerAlternativeBD($id);

        GlobalController::manageErrors("success", "Votre alternative a bien été supprimé");
        header("location: " . URL . "alternatives");
    }

    public function modifierAlternative($id)
    {
        $alternative = $this->alternativeManager->getAlternativeById($id);
        require "views/modifierAlternativeView.php";
    }

    public function modifierAlternativeValider()
    {
        $alternativeInfos = $_POST;

        $alternativeImage = $_FILES;

        if ($alternativeImage['newImage']['size'] !== 0 && $alternativeImage['newImage']['size'] !== $alternativeInfos['image']) {
            $imgToAdd = $alternativeImage['newImage']['name'];
            $this->alternativeManager->modifierAlternativeBD($_POST['id'], $alternativeInfos['titre'], $alternativeInfos['materiaux'], $alternativeInfos['fabrication'], $_POST['fonctionnement'], $imgToAdd, $_POST['difficulte'], $_POST['temps'], $_POST['necessite']);
            header("location: ../alternatives");
        } else {
            $imgToAdd = $alternativeInfos['image'];
            $this->alternativeManager->modifierAlternativeBD($_POST['id'], $alternativeInfos['titre'], $alternativeInfos['materiaux'], $alternativeInfos['fabrication'], $_POST['fonctionnement'], $imgToAdd, $_POST['difficulte'], $_POST['temps'], $_POST['necessite']);
            header("location: ../alternative");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "alternatives");
    }
}
