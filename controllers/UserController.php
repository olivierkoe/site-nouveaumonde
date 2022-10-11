<?php

require_once "models/UserManager.php";
require_once "controllers/GlobalController.php";

class UserController
{

    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
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
        header("location:" . URL);
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
        if (!empty($_POST['pseudoIn']) || !empty($_POST['mailIn']) || !empty($_POST['passwordIn']) || !empty($_POST['password2In'])) {
            if ($_POST['password'] === $_POST['password2']) {
                $password = password_hash($_POST['passwordIn'], PASSWORD_DEFAULT);
                $result = $this->userManager->addUserDB($_POST['pseudoIn'], $_POST['nom'], $_POST['prenom'], $_POST['mailIn'], $password);
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
}
