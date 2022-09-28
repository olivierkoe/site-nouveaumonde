<?php

require "models/conferenceManager.php";


class ConferenceController
{

    private $conferenceManager;

    function __construct()
    {
        $this->conferenceManager = new conferenceManager();
        $this->conferenceManager->chargementConferences();
    }

    public function afficherConferences()
    {
        $listeconferences = $this->conferenceManager->getConference();
        require "views/conferencesView.php";
    }

    public function afficherConference($id)
    {
        $conference = $this->conferenceManager->getConferenceById($id);
        require "views/conferenceView.php";
    }

    public function ajoutConference()
    {
        require "views/ajoutconferenceView.php";
    }

    public function ajoutConferenceValidation()
    {
        $infos = $_FILES['image'];
        $stockImage = "public/images/";
        $saveImage = GlobalController::ajoutImage($_POST['titre'], $infos, $stockImage);
        $resultAjout = $this->conferenceManager->ajoutConferenceBD($_POST['titre'], $_POST['invite'], $_POST['synopsis'], $_POST['date'], $_POST['heure'], $saveImage);
        if (!$resultAjout) {
            throw new Exception("conference non ajouter");
        }
        GlobalController::manageErrors("success", "Votre conference a bien été ajouté");

        header("location: " . URL . "conferences");
    }

    public function supprimerConference($id)
    {
        $conference = $this->conferenceManager->getConferenceById($id);

        $dirImage = $conference->getImage();
        unlink("public/images/" . $dirImage);
        $this->conferenceManager->supprimerConferenceBD($id);

        GlobalController::manageErrors("success", "Votre conference a bien été supprimé");
        header("location: " . URL . "conferences");
    }

    public function modifierConference($id)
    {
        $conference = $this->conferenceManager->getConferenceById($id);
        require "views/modifierConferenceView.php";
    }

    public function modifierConferenceValider()
    {
        $conferenceInfos = $_POST;

        $conferenceImage = $_FILES;

        if ($conferenceImage['newImage']['size'] !== 0 && $conferenceImage['newImage']['size'] !== $conferenceInfos['image']) {
            $imgToAdd = $conferenceImage['newImage']['name'];
            $this->conferenceManager->modifierConferenceBD($_POST['id'], $conferenceInfos['titre'], $conferenceInfos['invite'], $_POST['synopsis'], $conferenceInfos['date'], $_POST['heure'], $imgToAdd);
            header("location: ../conferences");
        } else {
            $imgToAdd = $conferenceInfos['image'];
            $this->conferenceManager->modifierConferenceBD($_POST['id'], $conferenceInfos['titre'], $conferenceInfos['invite'], $_POST['synopsis'], $conferenceInfos['date'], $_POST['heure'], $imgToAdd);
            header("location: ../conference");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "conferences");
    }
}
