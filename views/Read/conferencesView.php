<?php ob_start();

?>

<div class="container card d-flex flex-row flex-wrap ps-3 mt-3 bg-transparent border border-0" id="principal">

    <?php
    foreach ($listeconferences as $value) {
    ?> <div class="card m-auto mt-1 border border-0 mb-3" style="width: 30rem;">
            <img src="<?= URL ?>public/images/conferences/<?= $value->getImage() ?>" class="card-img-top" style="height: 18rem; object-fit: cover;" alt="image<?= $value->getTitre() ?>">
            <div class="card-body">
                <h5 class="card-title text-center"><a href="<?= URL ?>conferences/conference/<?= $value->getId() ?>"><?= $value->getTitre() ?></a></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nos invités : <?= $value->getInvite() ?></li>
                <li class="list-group-item">Le thème de la soirée : <?= $value->getTheme() ?></li>
                <li class="list-group-item">Date de l'événement : <?= $value->getDate() ?></li>
                <li class="list-group-item">L'heure de l'événement :<?= $value->getHeure() ?></li>
            </ul>
            <?php
            if ($_SESSION['role'] === "1") {
            ?>
                <div class="card-body d-flex align-items-end justify-content-center">
                    <div class="text-center">
                        <form action="<?= URL ?>conferences/supprimer/<?= $value->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette conference ?')">
                            <button class="btn btn-danger" name="">Supprimer</button>
                            <a href="<?= URL ?>conferences/modifier/<?= $value->getId() ?>" class="btn btn-warning">Modifier</a>
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
        <a href="<?= URL ?>conferences/ajouter" class="btn btn-success d-block">Ajouter</a>
    </div>
<?php
}
?>

<?php

$titre = "Conferences";
$content = ob_get_clean();
require_once "views/Read/template.php";
