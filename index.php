<!-- INDEX aussi appelé router -->
<?php

// On appel les different controler dont on aura besoin pour naviger sur le site
require "controllers/AtelierController.php";
require "controllers/ConferenceController.php";
require "controllers/LowtechController.php";
require "controllers/AlternativeController.php";
require "controllers/PartenaireController.php";
require "controllers/UserController.php";
require "controllers/presentationController.php";

// on démare un session
session_start();

//Definis un etat de session par défaut
if (!isset($_SESSION['role'])) $_SESSION['role'] = 0;

// on gére l'affichage de l'URL grace htaccess
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

// on stock dans des variables nos différentes construction de class
$contAtelier = new AtelierController();
$contConference = new ConferenceController();
$contLowtech = new LowtechController();
$contalternative = new AlternativeController();
$contPartenaire = new PartenaireController();
$userController = new UserController();
$contPresentation = new PresentationController();
$contUtilisateur = new UserController();

try {

    if (empty($_GET['page'])) {
        require "views/Read/accueilView.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch ($url[0]) {
                // si l'url[0] est égale à accueil alors on appel le controller présentation 
                // qui lanceras la fonction afficherPresentation()
            case "accueil":
                $contPresentation->afficherPresentation();
                break;

                // si l'url[0]  est égale à "conferences" et si l'url[1] est égale à "" alors on appel le controller conference 
                // qui lanceras la fonction afficherconferences()
            case "conferences":
                if (empty($url[1])) {
                    $contConference->afficherConferences();

                    // si l'url[0]  est égale à "conferences" et si l'url[1] est égale à "modifier" alors on appel le controller conference 
                    // qui lanceras la fonction modifierConference($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "modifier") {
                    $contConference->modifierConference($url[2]);

                    // si l'url[0]  est égale à "conferences" et si l'url[1] est égale à "modifierValider" alors on appel le controller conference 
                    // qui lanceras la fonction modifierConferenceValider()
                } else if ($url[1] === "modifValider") {
                    $contConference->modifierConferenceValider();

                    // si l'url[0]  est égale à "conferences" et si l'url[1] est égale à "supprimer" alors on appel le controller conference 
                    // qui lanceras la fonction supprimerConference($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "supprimer") {
                    $contConference->supprimerConference($url[2]);

                    // si l'url[0]  est égale à "conferences" et si l'url[1] est égale à "ajouter" alors on appel le controller conference 
                    // qui lanceras la fonction ajoutConference()
                } else if ($url[1] === "ajouter") {
                    $contConference->ajoutConference();

                    // si l'url[0]  est égale à "conferences" et si l'url[1] est égale à "valider" alors on appel le controller conference 
                    // qui lanceras la fonction ajoutConferenceValidation()
                } else if ($url[1] === "valider") {
                    $contConference->ajoutConferenceValidation();

                    // si l'url[0]  est égale à "conferences" et si l'url[1] est égale à "Conferences" alors on appel le controller conference 
                    // qui lanceras la fonction afficherconferences($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "Conferences") {
                    $contConference->afficherConferences($url[2]);

                    // si l'url[0]  est égale à "conference" et si l'url[1] est égale à "Conference" alors on appel le controller conference 
                    // qui lanceras la fonction afficherconference($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "conference") {
                    $contConference->afficherConference($url[2]);

                    // dans le cas ou l'URL ne correspond pas as un URL définis on retourne un message d'erreur
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;

                // si l'url[0]  est égale à "ateliers" et si l'url[1] est égale à "modifier" alors on appel le controller atelier 
                // qui lanceras la fonction afficherAteliers()
            case "ateliers":
                if (empty($url[1])) {
                    $contAtelier->afficherAteliers();

                    // si l'url[0]  est égale à "ateliers" et si l'url[1] est égale à "modifier" alors on appel le controller conférence 
                    // qui lanceras la fonction modifierValider()
                } else if ($url[1] === "modifier") {
                    $contAtelier->modifierAtelier($url[2]);

                    // si l'url[0]  est égale à "ateliers" et si l'url[1] est égale à "modifierValider" alors on appel le controller conférence 
                    // qui lanceras la fonction modifierAtelier($url[2]) où url[2] corresspond à l'id transmis par POST 
                } else if ($url[1] === "modifValider") {
                    $contAtelier->modifierAtelierValider();

                    // si l'url[0]  est égale à "ateliers" et si l'url[1] est égale à "supprimer" alors on appel le controller atelier 
                    // qui lanceras la fonction supprimerAtelier($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "supprimer") {
                    $contAtelier->supprimerAtelier($url[2]);

                    // si l'url[0]  est égale à "ateliers" et si l'url[1] est égale à "ajouter" alors on appel le controller atelier 
                    // qui lanceras la fonction ajoutAtelier()
                } else if ($url[1] === "ajouter") {
                    $contAtelier->ajoutAtelier();

                    // si l'url[0]  est égale à "ateliers" et si l'url[1] est égale à "valider" alors on appel le controller atelier 
                    // qui lanceras la fonction ajoutAtelierValidation()
                } else if ($url[1] === "valider") {
                    $contAtelier->ajoutAtelierValidation();

                    // si l'url[0]  est égale à "ateliers" et si l'url[1] est égale à "atelier" alors on appel le controller atelier 
                    // qui lanceras la fonction afficherAteliers($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "atelier") {
                    $contAtelier->afficherAtelier($url[2]);

                    // dans le cas ou l'URL ne correspond pas as un URL définis on retourne un message d'erreur
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;

                // si l'url[0]  est égale à "lowtechs" et si l'url[1] est égale à "" alors on appel le controller lowtech 
                // qui lanceras la fonction afficherLowtechs()
            case "lowtechs":
                if (empty($url[1])) {
                    $contLowtech->afficherLowtechs();

                    // si l'url[0]  est égale à "lowtechs" et si l'url[1] est égale à "modifier" alors on appel le controller lowtech 
                    // qui lanceras la fonction modifierLowtech($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "modifier") {
                    $contLowtech->modifierLowtech($url[2]);

                    // si l'url[0]  est égale à "lowtechs" et si l'url[1] est égale à "modifValider" alors on appel le controller lowtech 
                    // qui lanceras la fonction modifierLowtechValider()
                } else if ($url[1] === "modifValider") {
                    $contLowtech->modifierLowtechValider();

                    // si l'url[0]  est égale à "lowtechs" et si l'url[1] est égale à "supprimer" alors on appel le controller lowtech 
                    // qui lanceras la fonction supprimererLowtech($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "supprimer") {
                    $contLowtech->supprimerlowtech($url[2]);

                    // si l'url[0]  est égale à "lowtechs" et si l'url[1] est égale à "ajouter" alors on appel le controller lowtech 
                    // qui lanceras la fonction ajoutLowtech()
                } else if ($url[1] === "ajouter") {
                    $contLowtech->ajoutLowtech();

                    // si l'url[0]  est égale à "lowtechs" et si l'url[1] est égale à "ajouterValider" alors on appel le controller lowtech 
                    // qui lanceras la fonction ajoutLowtechValidation()
                } else if ($url[1] === "ajoutValider") {
                    $contLowtech->ajoutLowtechValidation();

                    // si l'url[0]  est égale à "lowtechs" et si l'url[1] est égale à "lowtech" alors on appel le controller lowtech 
                    // qui lanceras la fonction afficherLowtech($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "lowtechs") {
                    $contLowtech->afficherLowtechs($url[2]);

                    // si l'url[0]  est égale à "lowtechs" et si l'url[1] est égale à "lowtechs" alors on appel le controller lowtech 
                    // qui lanceras la fonction afficherLowtechs($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "lowtech") {
                    $contLowtech->afficherLowtech($url[2]);

                    // dans le cas ou l'URL ne correspond pas as un URL définis on retourne un message d'erreur
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;

                // si l'url[0]  est égale à "alternatives" et si l'url[1] est égale à "" alors on appel le controller alternative 
                // qui lanceras la fonction afficherAlternatives()
            case "alternatives":
                if (empty($url[1])) {
                    $contalternative->afficherAlternatives();

                    // si l'url[0]  est égale à "alternatives" et si l'url[1] est égale à "modifier" alors on appel le controller alternative
                    // qui lanceras la fonction modifierAlternative($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "modifier") {
                    $contalternative->modifierAlternative($url[2]);

                    // si l'url[0]  est égale à "alternatives" et si l'url[1] est égale à "modifValider" alors on appel le controller alternative 
                    // qui lanceras la fonction supprimerAlternative($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "modifValider") {
                    $contalternative->modifierAlternativeValider();

                    // si l'url[0]  est égale à "alternatives" et si l'url[1] est égale à "supprimer" alors on appel le controller alternative 
                    // qui lanceras la fonction modifierAlternativeValider($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "supprimer") {
                    $contalternative->supprimerAlternative($url[2]);

                    // si l'url[0]  est égale à "alternatives" et si l'url[1] est égale à "ajouter" alors on appel le controller alternative 
                    // qui lanceras la fonction afficherAlternatives()
                } else if ($url[1] === "ajouter") {
                    $contalternative->ajoutAlternative();

                    // si l'url[0]  est égale à "alternatives" et si l'url[1] est égale à "ajoutValider" alors on appel le controller alternative 
                    // qui lanceras la fonction ajoutAlternatives()
                } else if ($url[1] === "ajoutValider") {
                    $contalternative->ajoutAlternativeValidation();

                    // si l'url[0]  est égale à "alternatives" et si l'url[1] est égale à "alternatives" alors on appel le controller alternative 
                    // qui lanceras la fonction afficherAlternatives($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "alternatives") {
                    $contalternative->afficherAlternatives($url[2]);

                    // si l'url[0]  est égale à "alternatives" et si l'url[1] est égale à "alternative" alors on appel le controller alternative 
                    // qui lanceras la fonction afficherAlternative($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "alternative") {
                    $contalternative->afficherAlternative($url[2]);

                    // dans le cas ou l'URL ne correspond pas as un URL définis on retourne un message d'erreur
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;

                // si l'url[0]  est égale à "partenaires" et si l'url[1] est égale à "" alors on appel le controller partenaire 
                // qui lanceras la fonction afficherPartenaires()
            case "partenaires":
                if (empty($url[1])) {
                    $contPartenaire->afficherPartenaires();

                    // si l'url[0]  est égale à "partenaires" et si l'url[1] est égale à "modifier" alors on appel le controller partenaire
                    // qui lanceras la fonction modifierPartenaire($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "modifier") {
                    $contPartenaire->modifierPartenaire($url[2]);

                    // si l'url[0]  est égale à "partenaires" et si l'url[1] est égale à "" alors on appel le controller partenaire 
                    // qui lanceras la fonction modifierPartenaireValider()
                } else if ($url[1] === "modifValider") {
                    $contPartenaire->modifierPartenaireValider();

                    // si l'url[0]  est égale à "partenaires" et si l'url[1] est égale à "supprimer" alors on appel le controller partenaire
                    // qui lanceras la fonction supprimerPartenaire($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "supprimer") {
                    $contPartenaire->supprimerPartenaire($url[2]);

                    // si l'url[0]  est égale à "partenaires" et si l'url[1] est égale à "ajouter" alors on appel le controller partenaire 
                    // qui lanceras la fonction ajoutPartenaire()
                } else if ($url[1] === "ajouter") {
                    $contPartenaire->ajoutPartenaire();

                    // si l'url[0]  est égale à partenaires" et si l'url[1] est égale à "ajoutValider" alors on appel le controller partenaire 
                    // qui lanceras la fonction ajoutPartenaireValidation()
                } else if ($url[1] === "ajoutValider") {
                    $contPartenaire->ajoutPartenaireValidation();

                    // si l'url[0]  est égale à "partenaires" et si l'url[1] est égale à "partenaires" alors on appel le controller partenaire
                    // qui lanceras la fonction afficherPartenaires($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "partenaires") {
                    $contPartenaire->afficherPartenaires($url[2]);

                    // si l'url[0]  est égale à "partenaires" et si l'url[1] est égale à "partenaire" alors on appel le controller partenaire
                    // qui lanceras la fonction afficherPartenaire($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "partenaire") {
                    $contPartenaire->afficherPartenaire($url[2]);

                    // dans le cas ou l'URL ne correspond pas as un URL définis on retourne un message d'erreur
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;

                // si l'url[0]  est égale à "partenaires" et si l'url[1] est égale à "" alors on appel le controller partenaire 
                // qui lanceras la fonction afficherPartenaires()
            case "utilisateurs":
                if (empty($url[1])) {
                    $contUtilisateur->afficherUtilisateurs();

                    // si l'url[0]  est égale à "utilisateurs" et si l'url[1] est égale à "modifier" alors on appel le controller utilisateur
                    // qui lanceras la fonction modifierutilisateur($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "modifier") {
                    $contUtilisateur->modifierUtilisateur($url[2]);

                    // si l'url[0]  est égale à "utilisateurs" et si l'url[1] est égale à "" alors on appel le controller utilisateur 
                    // qui lanceras la fonction modifierutilisateurValider()
                } else if ($url[1] === "modifValider") {
                    $contUtilisateur->modifierUtilisateurValider();

                    // si l'url[0]  est égale à "utilisateurs" et si l'url[1] est égale à "supprimer" alors on appel le controller utilisateur
                    // qui lanceras la fonction supprimerutilisateur($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "supprimer") {
                    $contUtilisateur->supprimerUtilisateur($url[2]);

                    // si l'url[0]  est égale à "utilisateurs" et si l'url[1] est égale à "utilisateurs" alors on appel le controller utilisateur
                    // qui lanceras la fonction afficherutilisateurs($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "utilisateurs") {
                    $contUtilisateur->afficherUtilisateurs($url[2]);

                    // si l'url[0]  est égale à "utilisateurs" et si l'url[1] est égale à "utilisateur" alors on appel le controller utilisateur
                    // qui lanceras la fonction afficherutilisateur($url[2]) où url[2] corresspond à l'id transmis par POST
                } else if ($url[1] === "utilisateur") {
                    $contUtilisateur->afficherUtilisateur($url[2]);

                    // dans le cas ou l'URL ne correspond pas as un URL définis on retourne un message d'erreur
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;

                // si l'url[0]  est égale à "presentation" et si l'url[1] est égale à "modifier" alors on appel le controller presentatione 
                // qui lanceras la fonction modifierPresentation()  
            case "presentation":
                if ($url[1] === "modifier") {
                    $contPresentation->modifierPresentation();
                    // si l'url[0]  est égale à "presentation" et si l'url[1] est égale à "modifValider" alors on appel le controller presentation 
                    // qui lanceras la fonction modifierpresentationValider()
                } else if ($url[1] === "modifValider") {
                    $contPresentation->modifierPresentationValider();

                    // dans le cas ou l'URL ne correspond pas as un URL définis on retourne un message d'erreur
                } else {
                    throw new Exception("URL pas bonne");
                }
                break;

                // si l'url[0]  est égale à "mentionLegales" qui appeleras la vue mentionLegale
            case "mentionLegales":
                require "views/Read/mentionLegalView.php";
                break;

                // si l'url[0]  est égale à "connexion" alors on appel le controller user qui lanceras la fonction afficherConnexion()
            case "connexion":
                $userController->afficherConnexion();
                break;

                // si l'url[0]  est égale à "connexionValider" alors on appel le controller user qui lanceras la fonction connexion()
            case "connexionValider":
                $userController->connexion();
                break;

                // si l'url[0]  est égale à "deconnexion" alors on appel le controller user qui lanceras la fonction deconnexion()
            case "deconnexion":
                $userController->deconnexion();
                break;

                // si l'url[0]  est égale à "inscription" alors on appel le controller user qui lanceras la fonction afficherInscription()
            case "inscription":
                $userController->afficherInscription();
                break;

                // si l'url[0]  est égale à "inscriptionValider" alors on appel le controller user qui lanceras la fonction inscription()
            case "inscriptionValider":
                $userController->inscription();
                break;

                // si l'url[0]  est égale à "post_contact" alors on appel le controller post_contact.php
            case "post_contact":
                require "controllers/post_contact.php";
                break;

                // dans le cas ou l'URL ne correspond pas as un URL définis on retourne un message d'erreur
            default:
                throw new Exception("URL pas bonne");
        }
    }
} catch (Exception $e) {
    $message = $e->getMessage();
    require "views/Read/erreurView.php";
}
