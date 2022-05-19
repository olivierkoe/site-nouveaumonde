<?php
require "controllers/LivreController.php";

$contLivre = new LivreController();

if (empty($_GET['page'])) {
    require "views/accueilView.php";
} else {
    switch ($_GET['page']) {
        case "accueil":
            require "views/accueilView.php";
            break;
        case "livres":
            $contLivre->afficherLivres();
            break;
    }
}
