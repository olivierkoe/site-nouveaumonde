<?php

require "models/PartenaireManager.php";

class PartenaireController
{


    function __construct()
    {
        $this->partenairesManager = new PartenaireManager();
        $this->partenairesManager->chargementPartenaires();
    }

    public function afficherPartenaires()
    {
        $listePartenaires = $this->partenairesManager->getPartenaire();
        require "views/Read/partenairesView.php";
    }

    public function afficherPartenaire($id)
    {
        $partenaires = $this->partenairesManager->getPartenaireById($id);
        require "views/Read/partenairesView.php";
    }

    private function exploder($array)
    {
        return explode(".", $array);
    }

    public function ajoutPartenaire()
    {
        require "views/Create/ajoutPartenaireView.php";
    }

    public function ajoutPartenaireValidation()
    {
        //Stock les information de l'image de présentation dans la variable iunfos
        $infos = $_FILES['image'];
        //Stock les information de l'image de principe dans la variable iunfos2
        $stockImage = "public/images/partenaire/";

        $saveImage = GlobalController::ajoutImage($_POST['titre'], $infos, $stockImage);

        //ajoute la partenaires à la base de donnés
        $resultAjout = $this->partenairesManager->ajoutPartenaireBD(
            $_POST['titre'],
            $_POST['description'],
            $_POST['siteWeb'],
            $_POST['email'],
            $saveImage,
        );

        if (!$resultAjout) {
            throw new Exception("partenaires non ajouter");
        }
        GlobalController::manageErrors("success", "Votre partenaires a bien été ajouté");

        header("location: " . URL . "partenaires");
    }

    public function supprimerPartenaire($id)
    {
        $partenaires = $this->partenairesManager->getPartenaireById($id);

        $dirImage = $partenaires->getImage();
        unlink("public/images/" . $dirImage);
        $this->partenairesManager->supprimerPartenaireBD($id);

        GlobalController::manageErrors("success", "Votre partenaires a bien été supprimé");
        header("location: " . URL . "partenaires");
    }

    public function modifierPartenaire($id)
    {
        $partenaires = $this->partenairesManager->getPartenaireById($id);
        require "views/Update/modifierPartenairesView.php";
    }

    public function modifierPartenaireValider()
    {
        $partenairesInfos = $_POST;
        $partenairesImage = $_FILES;

        if ($partenairesImage['newImage']['size'] !== 0 && $partenairesImage['newImage']['size'] !== $partenairesInfos['imagePresentation']) {
            $imgToAdd = $partenairesImage['newImage']['name'];
            $this->partenairesManager->modifierPartenaireBD(
                $_POST['id'],
                $partenairesInfos['titre'],
                $partenairesInfos['description'],
                $partenairesInfos['siteWeb'],
                $_POST['email'],
                $imgToAdd
            );
            header("location: ../partenaires");
        } else {
            $imgToAdd = $partenairesInfos['imagePresentation'];
            $this->partenairesManager->modifierPartenaireBD(
                $_POST['id'],
                $partenairesInfos['titre'],
                $partenairesInfos['description'],
                $partenairesInfos['siteWeb'],
                $_POST['email'],
                $imgToAdd
            );
            header("location: ../partenaires");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "partenaires");
    }
}
