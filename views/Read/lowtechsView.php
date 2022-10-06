<?php ob_start();
?>

<div class="container card d-flex flex-row flex-wrap ps-3 mt-3 bg-transparent border border-0" id="principal">
    <?php
    foreach ($listelowtechs as $value) {
    ?>
        <div class="card m-auto mt-3 border border-0 mb-3" style="width: 18rem;">
            <img src="<?= URL ?>public/images/lowtech/imagepresentation/<?= $value->getImage() ?>" class="card-img-top p-1" style="height: 18rem; object-fit: cover;" alt="image<?= $value->getTitre() ?>" />
            <div class="card-body">
                <h5 class="card-title"><a href="<?= URL ?>lowtechs/lowtech/<?= $value->getId() ?>"><?= $value->getTitre() ?></a></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $value->getSmiley($value->getDifficulte()) ?></li>
                <li class="list-group-item"><?= $value->getTemps() ?></li>
                <li class="list-group-item"><?= $value->getNecessite() ?></li>
            </ul>

            <?php
            if ($_SESSION['role'] === "1") {
            ?>
                <div class="card-body">
                    <div class="text-center">
                        <form action="<?= URL ?>lowtechs/supprimer/<?= $value->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                            <button class="btn btn-danger">Supprimer</button>
                            <a href="<?= URL ?>lowtechs/modifier/<?= $value->getId() ?>" class="btn btn-warning">Modifier</a>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>
<?php
if ($_SESSION['role'] === "1") {
?>
    <div class="d-flex justify-content-center">
        <a href="<?= URL ?>lowtechs/ajouter" class="btn btn-success d-block col-3">Ajouter</a>
    </div>
<?php
}
?>
<?php

$titre = "Lowtechs";
$content = ob_get_clean();
require_once "views/Read/template.php";
