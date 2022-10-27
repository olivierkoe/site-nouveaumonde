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

    //afficher toute le Alternatives
    public function afficherAlternatives()
    {
        //sock dans une variable toutes les "alternatives" récuperées 
        $listealternatives = $this->alternativeManager->getAlternatives();
        //appel la vue pour afficher les "alternatives" récuperées
        require "views/Read/alternativesView.php";
    }

    //afficher une alternative grace as son ID
    public function afficherAlternative($id)
    {
        //sock dans une variable l' "alternatives" récuperés par rapport à une id
        $alternative = $this->alternativeManager->getAlternativeById($id);
        //appel la vue pour afficher l' "alternative" récuperée
        require "views/Read/alternativeView.php";
    }

    //appel la vue "formulaire d'ajout d' "alternative"
    public function ajoutAlternative()
    {
        require "views/Update/ajoutAlternativeView.php";
    }

    //AJOUTER UNE ALTERNATIVE
    public function ajoutAlternativeValidation()
    {
        //sock dans une variable les informations concernant l'image selectionné
        $infos = $_FILES['image'];
        // stock dans une variable le chemin d'accés à l'image sélectionné
        $stockImage = "public/images/alternatives/validation/";
        //concatène les information précédement récupé et stock l'image selectionné dans le dossier sélectionner
        $saveImage = GlobalController::ajoutImage($_POST['titre'], $infos, $stockImage);
        //ajoute l'alternative à la base de donné dans la table concerné
        $resultAjout = $this->alternativeManager->ajoutAlternativeBD($_POST['titre'], $saveImage, $_POST['theme'], $_POST['email'], $_POST['site']);
        //si un problème est survenu un message d'erreur est envoyé
        if ($resultAjout === false) {
            throw new Exception("Alternative non ajouter");
        }
        // si l'"alternative est bien inscrit dans la base de données et que l'image et bien dans le dossier voulue on revoie un message de confirmation
        GlobalController::manageErrors("success", "Votre alternative a bien été ajouté");
        // on redirige vers la pages principales de alternatives
        header("location: " . URL . "alternatives");
    }

    //SUPPRIMER une "alternative" grace à son ID
    public function supprimerAlternative($id)
    {
        //on stock dans une variable l' "alternative" selectionné grace à son id
        $alternative = $this->alternativeManager->getAlternativeById($id);
        //on supprime de la base de données l' "alternative" grace à son id
        $this->alternativeManager->supprimerAlternativeBD($id);
        //on renvoie un message pour dire que l'alternative est bien supprimé
        GlobalController::manageErrors("success", "Votre alternative a bien été supprimé");
        //on redirige vers la page principale des alternatives
        header("location: " . URL . "alternatives");
    }

    //Afficher le formulaire de modification d'une "alternative" grace à son ID
    public function modifierAlternative($id)
    {
        //on stock dans une variable l' "alternative" selectionné grace à son id
        $alternative = $this->alternativeManager->getAlternativeById($id);
        //appel la vue "formulaire de modification d' "alternative" ou on affiche l' "alternative" selectionné
        require "views/Update/modifierAlternativeView.php";
    }

    //MODIFICATION d'une "alternative"
    public function modifierAlternativeValider()
    {
        //on stock dans une variable les informations de l' "alternative" récuperé via le $_POST du formulaire de modification
        $alternativeInfos = $_POST;
        //on stock dans une variable les informations de l'image de l' "alternative" récuperé via le $_FILES du formulaire de modification
        $alternativeImage = $_FILES;
        // si la taille de l'image n'est pas égale à 0 octet et si elle n'est pas déjà existante 
        if ($alternativeImage['newImage']['size'] !== 0 && $alternativeImage['newImage']['size'] !== $alternativeInfos['image']) {
            //on ajoute l'image et les informations de l' "alternative" à la Base de données ainsi que l'image selectionné dans le fichier correspondant
            $imgToAdd = $alternativeImage['newImage']['name'];
            $this->alternativeManager->modifierAlternativeBD(

                $alternativeInfos['titre'],
                $imgToAdd,
                $alternativeInfos['theme'],
                $alternativeInfos['email'],
                $alternativeInfos['site'],
                $alternativeInfos['id'],
                $_POST['modifAuth']
            );
            //on redirige vers la page des "alternatives"
            header("location: ../alternatives");
            //dans le cas ou il n'y as pas d'image à rajouter ou qu'elle existe déja on ne modifie que l'es informations de l' "alternative"
        } else {

            $imgToAdd = $alternativeInfos['image'];
            $this->alternativeManager->modifierAlternativeBD(
                $alternativeInfos['titre'],
                $imgToAdd,
                $alternativeInfos['theme'],
                $alternativeInfos['email'],
                $alternativeInfos['site'],
                $alternativeInfos['id'],
                $_POST['modifAuth']
            );

            //on redirige vers la page de l' "alternative"
            header("location: ../alternative");
        }
        //dans les deux cas précédant on renvoie un message de confirmation
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        //on redirige vers la page des "alternatives"
        header("location: " . URL . "alternatives");
    }
}
