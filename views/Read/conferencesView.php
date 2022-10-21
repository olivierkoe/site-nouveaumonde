<?php ob_start();

?>

<div class="container card d-flex flex-row flex-wrap border border-0" id="principal">

    <?php
    foreach ($listeconferences as $value) {
    ?> <div id="confCard" class="card border border-0 mb-3">
            <img id="imgConference" src="<?= URL ?>public/images/conferences/<?= $value->getImage() ?>" class="card-img-top" alt="image<?= $value->getTitre() ?>">
            <div class="card-body">
                <h5 class="card-title text-center"><a href="<?= URL ?>conferences/conference/<?= $value->getId() ?>"><?= $value->getTitre() ?></a></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nos invités : <?= $value->getInvite() ?></li>
                <li class="list-group-item">Le thème de la soirée : <?= $value->getTheme() ?></li>
                <li class="list-group-item">Date de l'événement : <?= $value->getDate() ?></li>
                <li class="list-group-item">L'heure de l'événement :<?= $value->getHeure() ?></li>
            </ul>
        </div>
    <?php
    }
    ?>

</div>
<?php
if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
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
