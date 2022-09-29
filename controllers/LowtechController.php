<?php

require "models/LowtechManager.php";

class LowtechController
{

    private $lowtechManager;

    function __construct()
    {
        $this->lowtechManager = new LowtechManager();
        $this->lowtechManager->chargementLowtechs();
    }

    public function afficherLowtechs()
    {
        $listelowtechs = $this->lowtechManager->getLowtech();
        require "views/lowtechsView.php";
    }

    public function afficherLowtech($id)
    {
        $lowtech = $this->lowtechManager->getLowtechById($id);
        $necessite = $this->exploder($lowtech->getMateriaux());
        $fabrication = $this->exploder($lowtech->getFabrication());
        $fonctionnement = $this->exploder($lowtech->getFonctionnement());
        require "views/lowtechView.php";
    }

    private function exploder($array)
    {
        return explode(".", $array);
    }

    public function ajoutLowtech()
    {
        require "views/ajoutLowtechView.php";
    }

    public function ajoutLowtechValidation()
    {
        //Stock les information de l'image de présentation dans la variable iunfos
        $infos = $_FILES['image'];
        //Stock les information de l'image de principe dans la variable iunfos2
        $infos2 = $_FILES['imagePrincipe'];
        //dossier de sauvegarde de l'image de presentation
        $stockImage = "public/images/lowtech/imagepresentation/";
        //dossier de sauvegarde de l'image de Principe
        $stockImagePrincipe = "public/images/lowtech/imagePrincipe/";

        $saveImage = GlobalController::ajoutImage($_POST['titre'], $infos, $stockImage);

        $saveImagePrincipe = GlobalController::ajoutImage($_POST['titre'], $infos2, $stockImagePrincipe);
        //ajoute la lowtech à la base de donnés
        $resultAjout = $this->lowtechManager->ajoutLowtechBD($_POST['titre'], $_POST['materiaux'], $_POST['fabrication'], $_POST['fonctionnement'], $saveImage, $saveImagePrincipe, $_POST['difficulte'], $_POST['temps'], $_POST['necessite'], $_POST['source']);

        if (!$resultAjout) {
            throw new Exception("lowtech non ajouter");
        }
        GlobalController::manageErrors("success", "Votre lowtech a bien été ajouté");

        header("location: " . URL . "lowtechs");
    }

    public function supprimerLowtech($id)
    {
        $lowtech = $this->lowtechManager->getLowtechById($id);

        $dirImage = $lowtech->getImage();
        unlink("public/images/" . $dirImage);
        $this->lowtechManager->supprimerLowtechBD($id);

        GlobalController::manageErrors("success", "Votre lowtech a bien été supprimé");
        header("location: " . URL . "lowtechs");
    }

    public function modifierLowtech($id)
    {
        $lowtech = $this->lowtechManager->getLowtechById($id);
        require "views/modifierLowtechView.php";
    }

    public function modifierLowtechValider()
    {
        $lowtechInfos = $_POST;
        $lowtechImage = $_FILES;

        if ($lowtechImage['newImage']['size'] !== 0 && $lowtechImage['newImage']['size'] !== $lowtechInfos['imagePresentation']) {
            $imgToAdd = $lowtechImage['newImage']['name'];
            $imgToAdd2 = $lowtechImage['newImage2']['name'];
            $this->lowtechManager->modifierLowtechBD($_POST['id'], $lowtechInfos['titre'], $lowtechInfos['materiaux'], $lowtechInfos['fabrication'], $_POST['fonctionnement'], $imgToAdd, $imgToAdd2, $_POST['difficulte'], $_POST['temps'], $_POST['necessite'], $_POST['source']);
            header("location: ../lowtechs");
        } else {
            $imgToAdd = $lowtechInfos['imagePresentation'];
            $imgToAdd2 = $lowtechInfos['imagePrincipe'];
            $this->lowtechManager->modifierLowtechBD($_POST['id'], $lowtechInfos['titre'], $lowtechInfos['materiaux'], $lowtechInfos['fabrication'], $_POST['fonctionnement'], $imgToAdd, $imgToAdd2, $_POST['difficulte'], $_POST['temps'], $_POST['necessite'], $_POST['source']);
            header("location: ../lowtech");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "lowtechs");
    }
}
