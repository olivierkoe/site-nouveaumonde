<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $titre ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="le nouveau monde association de Montpellier base sur 3 valeur : le dialogue citoyen, la reappropriation de l'aspace public et la promotion de alternative">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL ?>style.css">
    <script src='https://js.hcaptcha.com/1/api.js' async defer></script>

</head>

<body>
    <header>
        <div>
            <nav id="navbarTemplate" class="navbar bg-white navbar-expand-lg mb-5">
                <div id="navposition" class=" container-fluid">
                    <a class="navbar-brand ms-5" href="<?= URL ?>/accueil"><img class="rounded-circle" id="imgLogo" alt="logo NMonde" width="20%;" src="<?= URL ?>public/images/LOGO_LE_NOUVEAU_MONDE.png"></a>
                    <button id="navbarToggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span id="navbarToggler" class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0 fs-4">
                            <li class="nav-item me-1">
                                <a class="nav-link active" aria-current="page" id="navTitle" href="<?= URL ?>accueil">Accueil</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link" href="<?= URL ?>conferences" id="navTitle">Conferences</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link" href="<?= URL ?>ateliers" id="navTitle">Ateliers</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link" href="<?= URL ?>lowtechs" id="navTitle">LowTechs</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link" href="<?= URL ?>alternatives" id="navTitle">Alternatives</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link" href="<?= URL ?>partenaires" id="navTitle">Partenaires</a>
                            </li>
                            <?php
                            if ($_SESSION['role'] === "1" || $_SESSION['role'] === "2" || $_SESSION['role'] === "3") {
                            ?>
                                <li class="nav-item me-1">
                                    <a class="nav-link" href="<?= URL ?>utilisateurs/utilisateur/<?= $_SESSION["pseudo"] ?>" id="navTitle">Profil</a>
                                </li>

                            <?php
                            }
                            if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
                            ?>
                                <li class="nav-item me-1">
                                    <a class="nav-link" href="<?= URL ?>utilisateurs" id="navTitle">Utilisateurs</a>
                                </li>

                            <?php
                            }
                            if (!isset($_SESSION['pseudo'])) {
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link active text-success" href="<?= URL ?>connexion" id="navTitle">Connexion</a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item ">
                                    <a class="nav-link active text-danger" href="<?= URL ?>deconnexion" id="navTitle">D??connexion</a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div id="scroll_to_top">
                    <a href="#top"><img src="<?= URL ?>/public/images/scrolltop.png" alt="Retourner en haut" /></a>
                </div>
            </nav>
            <?php
            if (isset($_SESSION['pseudo'])) {
            ?>
                <div class="col-8 m-auto text-center">
                    <p class="fs-5">Bienvenu <?= $_SESSION['pseudo'] ?> vous etes sur la page : <?= $titre ?></p>
                </div>
                <div class="container" height="800px">
                </div>

            <?php
            }
            ?>
        </div>
        <?php

        if (isset($_SESSION["alert"])) { ?>
            <div class=" container alert alert-<?= $_SESSION["alert"]["type"] ?>" role="alert">
                <p class="text-align"> <?= $_SESSION["alert"]["message"]; ?> </p>
            </div>
        <?php unset($_SESSION["alert"]);
        }
        ?>
    </header>

    <div class="container mb-3" id="contprincip">
        <?= $content ?>
    </div>

    <footer>
        <footer id="footer" class="text-white text-center text-lg-start">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Contacter nous</h5>
                        <form method="POST" action="post_contact" class="wpcf7-form">
                            <div class="contact-form-footer">
                                <p><span><input type="text" name="nom" size="30" placeholder="Votre nom" required></span></p>
                                <p><span><input type="email" name="email1" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" size="30" placeholder="Votre email" required></span></p>
                                <p><span><textarea name="votre-message" cols="32" rows="3" placeholder="Votre message" required></textarea></span></p>
                                <div><input type="submit" name="submit" value="Envoyer"><span class="ajax-loader"></span></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-center">
                        <img class="text-center" src="<?= URL ?>public/images/LOGO_LE_NOUVEAU_MONDE.png" alt="logo NMonde" width="70%;">
                        <span class="visually-hidden">(current)</span>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-end">
                        <ul class="list-unstyled">
                            <li class="nav-item text-end">
                                <a class="nav-link active" href="<?= URL ?>conferences" id="footerTitle">Conferences
                                    <span class="visually-hidden">(current)</span>
                                </a>
                                <a class="nav-link active" href="<?= URL ?>ateliers" id="footerTitle">Ateliers
                                    <span class="visually-hidden">(current)</span>
                                </a>
                                <a class="nav-link active" href="<?= URL ?>lowtechs" id="footerTitle">LowTechs
                                    <span class="visually-hidden">(current)</span>
                                </a>
                                <a class="nav-link active" href="<?= URL ?>alternatives" id="footerTitle">Alternatives
                                    <span class="visually-hidden">(current)</span>
                                </a>
                                <a class="nav-link active" href="<?= URL ?>partenaires" id="footerTitle">Partenaires
                                    <span class="visually-hidden">(current)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <p id="footerTitle" class="fs-6">* Champ obligatoire - <a href="<?= URL ?>mentionLegales"> Mentions l??gales </a></p>
                <p id="footerTitle"> ?? 2022 Copyright: <a class="text-white" href="#">NouveauMondeMontpellier</a></p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="<?= URL ?>js/script.js"></script>
</body>

</html>