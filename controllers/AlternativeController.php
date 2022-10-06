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
        require "views/Read/alternativesView.php";
    }

    public function afficherAlternative($id)
    {
        $alternative = $this->alternativeManager->getAlternativeById($id);
        require "views/Read/alternativeView.php";
    }

    public function ajoutAlternative()
    {
        require "views/Update/ajoutAlternativeView.php";
    }

    public function ajoutAlternativeValidation()
    {
        $infos = $_FILES['image'];
        $stockImage = "public/images/alternatives/validation/";
        $saveImage = GlobalController::ajoutImage($_POST['titre'], $infos, $stockImage);

        $resultAjout = $this->alternativeManager->ajoutAlternativeBD($_POST['titre'], $saveImage, $_POST['theme'], $_POST['email'], $_POST['site']);
        if ($resultAjout === false) {
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

        require "views/Update/modifierAlternativeView.php";
    }

    public function modifierAlternativeValider()
    {
        $alternativeInfos = $_POST;

        $alternativeImage = $_FILES;

        if ($alternativeImage['newImage']['size'] !== 0 && $alternativeImage['newImage']['size'] !== $alternativeInfos['image']) {
            $imgToAdd = $alternativeImage['newImage']['name'];
            $this->alternativeManager->modifierAlternativeBD(

                $alternativeInfos['titre'],
                $imgToAdd,
                $alternativeInfos['theme'],
                $alternativeInfos['email'],
                $alternativeInfos['site'],
                $alternativeInfos['id']
            );
            header("location: ../alternatives");
        } else {

            $imgToAdd = $alternativeInfos['image'];
            $this->alternativeManager->modifierAlternativeBD(
                $alternativeInfos['titre'],
                $imgToAdd,
                $alternativeInfos['theme'],
                $alternativeInfos['email'],
                $alternativeInfos['site'],
                $alternativeInfos['id']
            );


            header("location: ../alternative");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "alternatives");
    }
}
