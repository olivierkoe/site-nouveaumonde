<?php ob_start();
?>

<div class="container card d-flex flex-row flex-wrap ps-3 mt-3 bg-transparent border border-0" id="principal">
    <?php
    foreach ($listeUtilisateurs as $value) {
    ?>
        <figure id="mainCard" class="shadow card m-auto mt-3 border border-0 mb-3" style="width: 18rem;">
            <img src="<?= URL ?>public/images/utilisateurs/<?= $value->getImage() ?>" class="card-img-top p-1" style="height: 18rem; object-fit: cover;" alt="image<?= $value->getPseudo() ?>" />
            <div class="card-body">
                <h5 class="card-title"><a href="<?= URL ?>utilisateurs/utilisateur/<?= $value->getPseudo() ?>"><?= $value->getPseudo() ?></a></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $value->getNom() ?></li>
                <li class="list-group-item"><?= $value->getPrenom() ?></li>
                <li class="list-group-item"><?= $value->getMail() ?></li>
                <?php
                if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
                ?>
                    <li class="list-group-item"><?= $value->getRole() ?></li>
                <?php
                }
                ?>
            </ul>

            <?php
            if ($_SESSION['role'] === "1") {
            ?>
                <div class="card-body">
                    <div class="text-center">
                        <form action="<?= URL ?>utilisateurs/supprimer/<?= $value->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                            <a href="<?= URL ?>utilisateurs/modifier/<?= $value->getId() ?>" class="shadow btn btn-warning">Modifier</a>
                            <?php
                            if ($_SESSION['role'] === "1") {
                            ?>

                                <button class="shadow btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
        <?php
                            }
                        }
        ?>
        </figure>
    <?php
    }
    ?>
</div>
<?php

$titre = "Utilisateurs";
$content = ob_get_clean();
require_once "views/Read/template.php";
