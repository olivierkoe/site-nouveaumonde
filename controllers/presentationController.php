<?php

require "models/presentationManager.php";

class PresentationController
{

    private $presentationManager;

    function __construct()
    {
        $this->presentationManager = new PresentationManager();
        $this->presentationManager->chargementPresentation();
    }

    private function exploder($array)
    {
        return explode(".", $array);
    }

    public function afficherPresentation()
    {
        $fullPresentation = $this->presentationManager->getPresentation();
        $description = $fullPresentation[0]->getDescription();
        $descriptionPresentation = $this->exploder($description);
        require "views/Read/AccueilView.php";
    }

    public function modifierPresentation()
    {
        $presentation = $this->presentationManager->getPresentation();
        require "views/Update/modifierPresentationView.php";
    }

    public function modifierPresentationValider()
    {
        $presentationInfos = $_POST;

        $presentationImage = $_FILES;

        if ($presentationImage['newImage']['size'] !== 0 && $presentationImage['newImage']['size'] !== $presentationInfos['image']) {
            $imgToAdd = $presentationImage['newImage']['name'];
            $this->presentationManager->modifierPresentationBD(

                $presentationInfos['titre'],
                $imgToAdd,
                $presentationInfos['description'],
                $presentationInfos['contact'],
                $presentationInfos['id']
            );
            header("location: ../accueil");
        } else {

            $imgToAdd = $presentationInfos['image'];
            $this->presentationManager->modifierPresentationBD(
                $presentationInfos['titre'],
                $imgToAdd,
                $presentationInfos['description'],
                $presentationInfos['contact'],
                $presentationInfos['id']
            );


            header("location: ../presentation");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "accueil");
    }
}
