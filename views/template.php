<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL ?>style.css">
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <div>
            <nav class="navbar navbar-expand-lg bg-light mb-5">
                <div class="col-1"></div>
                <div class=" container-fluid">
                    <a class="navbar-brand" href="#"><img src="<?= URL ?>public/images/LOGO_LE_NOUVEAU_MONDE.png" alt="logo NMonde" width="100px;"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  mb-2 mb-lg-0 fs-4">
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page" href="<?= URL ?>accueil">Accueil</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="<?= URL ?>conferences">Conferences</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="<?= URL ?>ateliers">Ateliers</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="<?= URL ?>lowtechs">LowTechs</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="<?= URL ?>alternatives">Alternatives</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="<?= URL ?>billetterie">Billetterie</a>
                            </li>
                            <li class="col-1">

                            </li>
                            <li>
                                <?php
                                if (!isset($_SESSION['pseudo'])) {
                                ?>
                            <li class="nav-item">
                                <a class="nav-link active pt-3 text-success" href="<?= URL ?>connexion">Connexion</a>
                            </li>
                        <?php
                                } else {
                        ?>
                            <li class="nav-item ">
                                <a class="nav-link active text-danger" href="<?= URL ?>deconnexion">Déconnexion</a>
                            </li>
                            <li class="col-4">
                                <p class="mt-2 text-dark text-center">Bienvenu : <?= $_SESSION['pseudo'] ?></p>
                            </li>
                        <?php
                                }
                        ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
            if (isset($_SESSION['pseudo'])) {
            ?>
                <div class="container" height="800px">

                </div>
            <?php
            }
            ?>
            <div class="container text-center">
                <h1 class="rounded border border-dark m-2 p-2 text-center" id="titeTemplate"> <?= $titre ?></h1>
            </div>
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
        <nav class="navbar navbar-expand-lg navbar border-0" id="footer">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-5 ">
                        <li class="col-7">
                            <form method="post" class="wpcf7-form" novalidate="novalidate">
                                <div class="contact-form-footer">
                                    <p><span class=""><input type="text" name="nom" value="" size="30" class="" aria-invalid="false" placeholder="Votre nom"></span></p>
                                    <p><span class=""><input type="email" name="email1" value="" size="30" class="" aria-invalid="false" placeholder="Votre email"></span></p>
                                    <p><span class=""><textarea name="votre-message" cols="32" rows="3" class="" aria-invalid="false" placeholder="Votre message"></textarea></span></p>
                                    <div><input type="submit" value="Envoyer" class=""><span class="ajax-loader"></span></div>
                                </div>
                            </form>
                        </li>
                        <li class="col-4">

                        </li>
                        <li class="nav-item pt-2 col-4 text-center">
                            <img class="text-center" src="<?= URL ?>public/images/LOGO_LE_NOUVEAU_MONDE.png" alt="logo NMonde" width="80%;">
                            <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item col-7 text-end">
                            <a class="nav-link active text-dark" href="<?= URL ?>conferences">Conferences
                                <span class="visually-hidden">(current)</span>
                            </a>
                            <a class="nav-link active text-dark" href="<?= URL ?>ateliers">Ateliers
                                <span class="visually-hidden">(current)</span>
                            </a>
                            <a class="nav-link active text-dark" href="<?= URL ?>lowtechs">LowTechs
                                <span class="visually-hidden">(current)</span>
                            </a>
                            <a class="nav-link active text-dark" href="<?= URL ?>billetterie">Billetterie
                                <span class="visually-hidden">(current)</span>
                            </a>

                            <?php
                            if (!isset($_SESSION['pseudo'])) {
                            ?>
                                <a class="nav-link active text-success" href="<?= URL ?>connexion">Connexion</a>
                            <?php
                            } else {
                            ?>
                                <a class="nav-link active text-danger" href="<?= URL ?>deconnexion">Déconnexion</a>
                            <?php
                            }
                            ?>
                        </li>
                        <li class="nav-item col-4 text-end">
                        </li>
                    </ul>
        </nav>
    </footer>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>