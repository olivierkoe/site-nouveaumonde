<?php

require "controllers/AtelierController.php";
require "controllers/ConferenceController.php";
require "controllers/LowtechController.php";
require "controllers/AlternativeController.php";
require "controllers/UserController.php";

session_start();
//Definis un etat de session par défaut
if (!isset($_SESSION['role'])) $_SESSION['role'] = 0;

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));


$contAtelier = new AtelierController();
$contConference = new ConferenceController();
$contLowtech = new LowtechController();
$contalternative = new AlternativeController();
$userController = new UserController();

try {

    if (empty($_GET['page'])) {
        require "views/accueilView.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch ($url[0]) {
            case "accueil":
                require "views/accueilView.php";
                break;
            case "ateliers":
                if (empty($url[1])) {
                    $contAtelier->afficherAteliers();
                } else if ($url[1] === "modifier") {
                    $contAtelier->modifierAtelier($url[2]);
                } else if ($url[1] === "modifValider") {
                    $contAtelier->modifierAtelierValider();
                } else if ($url[1] === "supprimer") {
                    $contAtelier->supprimerAtelier($url[2]);
                } else if ($url[1] === "ajouter") {
                    $contAtelier->ajoutAtelier();
                } else if ($url[1] === "valider") {
                    $contAtelier->ajoutAtelierValidation();
                } else if ($url[1] === "ateliers") {
                    $contAtelier->afficherAteliers($url[2]);
                } else if ($url[1] === "atelier") {
                    $contAtelier->afficherAtelier($url[2]);
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;
            case "conferences":
                if (empty($url[1])) {
                    $contConference->afficherConferences();
                } else if ($url[1] === "modifier") {
                    $contConference->modifierConference($url[2]);
                } else if ($url[1] === "modifValider") {
                    $contConference->modifierConferenceValider();
                } else if ($url[1] === "supprimer") {
                    $contConference->supprimerConference($url[2]);
                } else if ($url[1] === "ajouter") {
                    $contConference->ajoutConference();
                } else if ($url[1] === "valider") {
                    $contConference->ajoutConferenceValidation();
                } else if ($url[1] === "Conferences") {
                    $contConference->afficherConferences($url[2]);
                } else if ($url[1] === "conference") {
                    $contConference->afficherConference($url[2]);
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;
            case "lowtechs":
                if (empty($url[1])) {
                    $contLowtech->afficherLowtechs();
                } else if ($url[1] === "modifier") {
                    $contLowtech->modifierLowtech($url[2]);
                } else if ($url[1] === "modifValider") {
                    $contLowtech->modifierLowtechValider();
                } else if ($url[1] === "supprimer") {
                    $contLowtech->supprimerlowtech($url[2]);
                } else if ($url[1] === "ajouter") {
                    $contLowtech->ajoutLowtech();
                } else if ($url[1] === "ajoutValider") {
                    $contLowtech->ajoutLowtechValidation();
                } else if ($url[1] === "lowtechs") {
                    $contLowtech->afficherLowtechs($url[2]);
                } else if ($url[1] === "lowtech") {
                    $contLowtech->afficherLowtech($url[2]);
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;
            case "alternatives":
                if (empty($url[1])) {
                    $contalternative->afficherAlternatives();
                } else if ($url[1] === "modifier") {
                    $contalternative->modifierAlternative($url[2]);
                } else if ($url[1] === "modifValider") {
                    $contalternative->modifierAlternativeValider();
                } else if ($url[1] === "supprimer") {
                    $contalternative->supprimerAlternative($url[2]);
                } else if ($url[1] === "ajouter") {
                    $contalternative->ajoutAlternative();
                } else if ($url[1] === "ajoutValider") {
                    $contalternative->ajoutAlternativeValidation();
                } else if ($url[1] === "alternatives") {
                    $contalternative->afficherAlternatives($url[2]);
                } else if ($url[1] === "alternative") {
                    $contalternative->afficherAlternative($url[2]);
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;
            case "connexion":
                $userController->afficherConnexion();
                break;
            case "connexionValider":
                $userController->connexion();
                break;
            case "deconnexion":
                $userController->deconnexion();
                break;
            case "inscription":
                $userController->afficherInscription();
                break;
            case "inscriptionValider":
                $userController->inscription();
                break;
            default:
                throw new Exception("URL pas bonne");
        }
    }
} catch (Exception $e) {
    $message = $e->getMessage();
    require "views/erreurView.php";
}
