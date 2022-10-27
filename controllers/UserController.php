<?php

require_once "models/UserManager.php";
require_once "controllers/GlobalController.php";

class UserController
{

    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->userManager->chargementUsers();
    }

    public function afficherConnexion()
    {
        if (!isset($_SESSION['pseudo'])) {
            require "views/Read/connexionView.php";
        } else {
            GlobalController::manageErrors("danger", "Vous êtes déjà connecté ...");
            header("location:" . URL . "accueil");
        }
    }

    public function connexion()
    {
        if (!empty($_POST['pseudo']) || !empty($_POST['password'])) {
            $user = $this->userManager->getUserByPseudoDB($_POST['pseudo']);

            if ($user) {
                if (password_verify($_POST['password'], $user->getPassword())) {
                    $_SESSION['pseudo'] = $user->getPseudo();
                    $_SESSION['role'] = $user->getRole();

                    GlobalController::manageErrors("success", "Bonjour " . $_SESSION['pseudo']);
                    header("location:" . URL . "accueil");
                } else {
                    GlobalController::manageErrors("danger", "1 Les informations renseignées sont incorrectes.");
                    header("location:" . URL . "connexion");
                }
            } else {
                GlobalController::manageErrors("danger", "2 Les informations renseignées sont incorrectes");
                header("location:" . URL . "connexion");
            }
        } else {
            GlobalController::manageErrors("danger", "Veuillez renseigner votre pseudo et votre mot de passe");
            header("location:" . URL . "connexion");
        }
    }

    public function deconnexion()
    {
        session_destroy();
        header("location:" . URL . "accueil");
    }

    public function afficherInscription()
    {
        if (!isset($_SESSION['pseudo'])) {
            require "views/Read/inscriptionView.php";
        } else {
            GlobalController::manageErrors("danger", "Vous êtes déjà inscrit ...");
            header("location:" . URL . "accueil");
        }
    }

    public function inscription()
    {

        if (isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])) {
            $secret = '0x0000000000000000000000000000000000000000';
            $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret=' . $secret . '&response=' . $_POST['h-captcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR']);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                if (!empty($_POST['pseudo']) || !empty($_POST['mail']) || !empty($_POST['password']) || !empty($_POST['password2'])) {
                    if ($_POST['password'] === $_POST['password2']) {
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $infos = $_FILES['image'];
                        $stockImage = "public/images/utilisateurs/";
                        $saveImage = GlobalController::ajoutImage($_POST['pseudo'], $infos, $stockImage);
                        $result = $this->userManager->addUserDB($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $password, $saveImage);
                        if ($result) {
                            GlobalController::manageErrors("success", "Inscription effectuée");
                            header("location:" . URL . "connexion");
                        } else {
                            throw new Exception("Une erreur est survenue lors de votre inscription");
                        }
                    } else {
                        GlobalController::manageErrors("danger", "Veuillez confirmer votre mot de passe");
                        header("location:" . URL . "inscription");
                    }
                } else {
                    GlobalController::manageErrors("danger", "Veuillez remplir tout les champs");
                    header("location:" . URL . "inscription");
                }
            }
        } else {
            var_dump("farid");
            GlobalController::manageErrors("danger", "Veuillez vérifier le captcha !!");
            header("location:" . URL . "inscription");
        }
    }

    public function afficherUtilisateurs()
    {
        $listeUtilisateurs = $this->userManager->getUser();
        // var_dump($listeUtilisateurs);
        // exit;
        require "views/Read/utilisateursView.php";
    }

    public function afficherUtilisateur($pseudo)
    {
        $utilisateur = $this->userManager->getUserByPseudoDB($pseudo);
        require "views/Read/utilisateurView.php";
    }

    private function exploder($array)
    {
        return explode(".", $array);
    }

    public function ajoutUtilisateur()
    {
        require "views/Update/ajoutUtilisateurView.php";
    }


    public function supprimerUtilisateur($id)
    {
        $utilisateur = $this->userManager->getUserByIdDb($id);

        $dirImage = $utilisateur->getImage();
        unlink("public/images/" . $dirImage);
        $this->userManager->supprimerUserBD($id);

        GlobalController::manageErrors("success", "Votre utilisateur a bien été supprimé");
        header("location: " . URL . "utilisateurs");
    }

    public function modifierUtilisateur($id)
    {

        $utilisateur = $this->userManager->getUserByIdDb($id);
        require "views/Update/modifierutilisateurView.php";
    }

    public function modifierUtilisateurValider()
    {
        $utilisateurInfos = $_POST;
        $utilisateurImage = $_FILES;

        if ($utilisateurImage['newImage']['size'] !== 0 && $utilisateurImage['newImage']['size']) {
            $imgToAdd = $utilisateurImage['newImage']['name'];
            $this->utilisateurManager->modifierUtilisateurBD($_POST['id'], $utilisateurInfos['pseudo'], $utilisateurInfos['nom'], $utilisateurInfos['prenom'], $_POST['mail'], $imgToAdd, $_POST['role'], $_POST['modifAuth']);
            header("location: ../utilisateurs");
        } else {
            $imgToAdd = $utilisateurInfos['image'];
            $this->userManager->modifierUserBD($_POST['id'], $utilisateurInfos['pseudo'], $utilisateurInfos['nom'], $utilisateurInfos['prenom'], $_POST['mail'], $imgToAdd, $_POST['role'], $_POST['modifAuth']);
            header("location: ../utilisateur");
        }
        GlobalController::manageErrors("success", "Les modifications ont bien été enregistrées");
        header("location: " . URL . "utilisateurs");
    }
}
