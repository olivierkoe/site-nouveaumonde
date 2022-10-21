<?php ob_start();
// var_dump($utilisateur);
?>

<div class="container card d-flex flex-row flex-wrap ps-3 mt-3 bg-transparent border border-0" id="principal">

    <figure class="card m-auto mt-3 border border-0 mb-3" style="width: 18rem;">
        <img src="<?= URL ?>public/images/utilisateurs/<?= $utilisateur->getImage() ?>" class="card-img-top p-1" style="height: 18rem; object-fit: cover;" alt="image<?= $utilisateur->getPseudo() ?>" />
        <div class="card-body">
            <h5 class="card-title"><a href="<?= URL ?>utilisateurs/utilisateur/<?= $utilisateur->getId() ?>"><?= $utilisateur->getPseudo() ?></a></h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $utilisateur->getNom() ?></li>
            <li class="list-group-item"><?= $utilisateur->getPrenom() ?></li>
            <li class="list-group-item"><?= $utilisateur->getMail() ?></li>
            <li class="list-group-item"><?= $utilisateur->getRole() ?></li>
        </ul>
        <?php
        if ($_SESSION['pseudo'] === $utilisateur->getPseudo() && $_SESSION['role'] != "1") {
        ?>
            <a href="<?= URL ?>utilisateurs/modifier/<?= $utilisateur->getId() ?>" class="btn btn-warning">Modifier</a>
        <?php
        }
        if ($_SESSION['role'] === "1") {
        ?>
            <div class="card-body">
                <div class="text-center">
                    <form action="<?= URL ?>utilisateurs/supprimer/<?= $utilisateur->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                        <a href="<?= URL ?>utilisateurs/modifier/<?= $utilisateur->getId() ?>" class="btn btn-warning">Modifier</a>
                        <?php
                        if ($_SESSION['role'] === "1") {
                        ?>
                            <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        <?php
                        }
        ?>
    </figure>
<?php
        }
?>
</div>
<?php

$titre = "Utilisateur";
$content = ob_get_clean();
require_once "views/Read/template.php";
