<?php ob_start();

?>

<div class="container card d-flex flex-row flex-wrap ps-3 mt-3 bg-transparent border border-0" id="principal">

    <figure id="mainCard" class="shadow card m-auto mt-3 border border-0 mb-3" style="width: 18rem;">
        <img src="<?= URL ?>public/images/utilisateurs/<?= $utilisateur->getImage() ?>" class="card-img-top p-1" style="height: 18rem; object-fit: cover;" alt="image<?= $utilisateur->getPseudo() ?>" />
        <div class="card-body">
            <h5 class="card-title"><?= $utilisateur->getPseudo() ?></a></h5>
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
            <p class="mt-3 text-center" id="legende">Créer le <?= $utilisateur->getDateCreation() ?> </p>
            <a href="<?= URL ?>utilisateurs/modifier/<?= $utilisateur->getId() ?>" class="shadow btn btn-warning">Modifier</a>
        <?php
        }
        if ($_SESSION['role'] === "1") {
        ?>
            <div class="card-body">
                <div class="text-center">
                    <form action="<?= URL ?>utilisateurs/supprimer/<?= $utilisateur->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                        <a href="<?= URL ?>utilisateurs/modifier/<?= $utilisateur->getId() ?>" class="shadow btn btn-warning">Modifier</a>
                        <?php
                        if ($_SESSION['role'] === "1") {
                        ?>
                            <button class="shadow btn btn-danger">Supprimer</button>
                            <p class="mt-3 text-center" id="legende">Créer le <?= $utilisateur->getDateCreation() ?> </p>
                            <p class="mt-3" id="legende">Modifié le <?= $utilisateur->getDateModif() ?> par <?= $utilisateur->getModifAuth() ?></p>
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
