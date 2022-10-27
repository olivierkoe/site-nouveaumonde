<?php ob_start();
?>

<div class="container card d-flex flex-row flex-wrap ps-3 mt-3 bg-transparent border border-0" id="principal">
    <?php
    foreach ($listelowtechs as $value) {
    ?>
        <figure class="shadow card m-auto mt-3 border border-0 mb-3" id="mainCard" style="width: 18rem;">
            <img src="<?= URL ?>public/images/lowtech/imagepresentation/<?= $value->getImage() ?>" id="imageCardPresentation" class="card-img-top p-1" style="height: 18rem; object-fit: cover;" alt="image<?= $value->getTitre() ?>" />
            <div class="card-body">
                <h5 class="card-title"><a href="<?= URL ?>lowtechs/lowtech/<?= $value->getId() ?>"><?= $value->getTitre() ?></a></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $value->getSmiley($value->getDifficulte()) ?></li>
                <li class="list-group-item"><?= $value->getTemps() ?></li>
                <li class="list-group-item"><?= $value->getNecessite() ?></li>
            </ul>

            <?php
            if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
            ?>
                <div class="card-body">
                    <div class="text-center">
                        <form action="<?= URL ?>lowtechs/supprimer/<?= $value->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                            <p class="mt-3" id="legende">Créer le <?= $value->getDateCreation() ?> </p>
                            <a href="<?= URL ?>lowtechs/modifier/<?= $value->getId() ?>" class="shadow btn btn-warning">Modifier</a>
                            <?php
                            if ($_SESSION['role'] === "1") {
                            ?>
                                <button class="shadow btn btn-danger">Supprimer</button>
                                <p class="mt-3" id="legende">Modifié le <?= $value->getDateModif() ?> par <?= $value->getModifAuth() ?></p>
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
if ($_SESSION['role'] === "1") {
?>
    <div class="d-flex justify-content-center">
        <a href="<?= URL ?>lowtechs/ajouter" class="shadow btn btn-success d-block col-3">Ajouter</a>
    </div>
<?php
}
?>
<?php

$titre = "Lowtechs";
$content = ob_get_clean();
require_once "views/Read/template.php";
