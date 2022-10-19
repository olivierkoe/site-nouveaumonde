<?php ob_start();

?>
<div id="partenaireContainer" class="container card d-flex flex-row flex-wrap ps-3 mt-3 bg-transparent border border-0" id="partenaireContainer">
    <?php
    foreach ($listePartenaires as $value) {
    ?>
        <div id="partenaireCard" class="card d-flex flex-row flex-wrap mt-3 border border-1 mb-3 m-auto p-3">

            <div id="cardBodyPartenaire" class="card-body col-8" style=" height: 70%">
                <h5 id="partenaireTitre" class="card-title"><?= $value->getTitre() ?></h5>
                <P class="list-group-item border border-0"><?= $value->getDescription() ?></p>

            </div>
            <div class="col-4">
                <img class="card-img-top rounded-circle" style="height: 50%; object-fit: contain;" alt="image<?= $value->getTitre() ?>" src="<?= URL ?>public/images/partenaire/<?= $value->getImage() ?>" />
            </div>
            <div>
                <div class="card-body d-flex align-items-end justify-content-center">
                    <ul class="list-group list-group-flush">
                        <div class="d-flex flex-column">
                            <li class="list-group-item border border-0"><a href="<?= $value->getSiteWeb() ?>"><?= $value->getSiteWeb() ?></a></li>
                            <li class="list-group-item border border-0"><?= $value->getEmail() ?></li>
                        </div>
                    </ul>
                </div>
                <?php
                if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
                ?>
                    <div class="card-body d-flex align-items-end justify-content-center">
                        <div class="text-end">
                            <form action="<?= URL ?>partenaires/supprimer/<?= $value->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                                <a href="<?= URL ?>partenaires/modifier/<?= $value->getId() ?>" class="btn btn-warning">Modifier</a>
                                <?php
                                if ($_SESSION['role'] === "1") {
                                ?>
                                    <button class="btn btn-danger">Supprimer</button>

                            </form>
                        <?php
                                }
                        ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>

</div>
<?php
if ($_SESSION['role'] === "1") {
?>
    <div class="d-flex justify-content-center">
        <a href="<?= URL ?>partenaires/ajouter" class="btn btn-success d-block col-3">Ajouter</a>
    </div>
<?php
}
?>
<?php

$titre = "Partenaires";
$content = ob_get_clean();
require_once "views/Read/template.php";
