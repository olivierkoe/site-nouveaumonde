<?php ob_start();

?>

<div class="m-2 p-2 border border-0 rounded-3">
    <h1 class="text-center">Atelier Scotch</h1>
    <?php
    foreach ($listeAteliers as $value) {
    ?>
        <div id="mainAtelier" class="shadow card d-flex flex-wrap">
            <h2 class="card-title fs-3 mt-3 mb-1 text-center"><?= $value->getTitre() ?></h2>
            <h3 class="text-center fs-5 mb-3">Budget de l'état 250.7 mds € par an </h3>
            <div class="d-flex flex-row flex-wrap justify-content-evenly">

                <?php
                if (!empty($value->getArgument1())) {
                ?>
                    <article id="atelierCard" class="shadow card d-flex col-5">
                        <h5> <?= $value->getArgument1() ?></h5>
                        <div id="atelierText">
                            <p id="textCard" class="align-middle fs-6">Pour un montant de <?= $value->getPrix1() ?> milliards € par an</p>
                            <div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= (100 / 250.7) * $value->getPrix1() ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-1"><?= sprintf("%.2f", ((100 / 250.7) * $value->getPrix1())) ?> % du budget de l'état </p>
                            <p>Soit <?= sprintf("%.2f", ($value->getPrix2() / $value->getPrix1())) ?> fois moins que la <?= $value->getArgument2() ?></p>
                        </div>
                        <div class="text-center">
                            <p class="btn btn-light d-flex flex-row align-items-end justify-content-center">Source : <a href="<?= $value->getSourceArg1() ?>">liens</a></p>
                        </div>
                    </article>
                <?php
                }

                if (!empty($value->getArgument2())) {
                ?>
                    <article id="atelierCard" class="shadow card d-flex col-5">
                        <h5> <?= $value->getArgument2() ?></h5>
                        <div>
                            <p id="textCard" class="align-middle  fs-6">Pour un montant de <?= $value->getPrix2() ?> milliards € par an </p>
                            <div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= (100 / 250.7) * $value->getPrix2() ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-1"> <?= sprintf("%.2f", ((100 / 250.7) * $value->getPrix2())) ?> % du budget de l'état </p>
                            <p>Soit <?= sprintf("%.2f", ($value->getPrix2() / $value->getPrix1())) ?> fois plus que la <?= $value->getArgument1() ?></p>
                        </div>
                        <div class="text-center align-items-end">
                            <p class="btn btn-light d-flex flex-row justify-content-center">Sources : <a href="<?= $value->getSourceArg2() ?>">liens</a></p>
                        </div>
                    </article>
                <?php
                }
                if (!empty($value->getArgument3())) {
                ?>
                    <article id="atelierCard" class="card d-flex col-5">
                        <h5> <?= $value->getArgument3() ?></h5>
                        <div>
                            <p id="textCard" class="align-middle">Pour un montant de <?= $value->getPrix3() ?> milliards € par an</p>
                            <div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= (100 / 250.7) * $value->getPrix3() ?>%;" aria-valuenow="25" aria-valuemin="50" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-1"><?= sprintf("%.2f", ((100 / 250.7) * $value->getPrix3())) ?> % du budget de l'état </p>
                            <p>Soit <?= sprintf("%.2f", ($value->getPrix3() / $value->getPrix1())) ?> fois plus que la <?= $value->getArgument1() ?></p>
                            <p>Soit <?= sprintf("%.2f", ($value->getPrix2() / $value->getPrix3())) ?> fois moins que la <?= $value->getArgument2() ?></p>
                        </div>
                        <div class="text-center">
                            <p class="btn btn-light d-flex flex-row justify-content-center">Source : <a href="<?= $value->getSourceArg3() ?>">liens</a></p>
                        </div>
                    </article>
                <?php
                }
                ?>
            </div>
            <?php
            if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
            ?><div class="text-center">
                    <p class="mt-3" id="legende">Créer le <?= $value->getDateCreation() ?> </p>
                    <p class="mt-3" id="legende">Modifié le <?= $value->getDateModif() ?> par <?= $value->getModifAuth() ?></p>
                </div>
                <div id="btnAtelierCard">
                    <p><a href="<?= URL ?>ateliers/modifier/<?= $value->getId() ?>" class="shadow btn btn-warning me-3">Modifier</a></p>
                    <?php
                    if ($_SESSION['role'] === "1") {
                    ?>
                        <form action="<?= URL ?>ateliers/supprimer/<?= $value->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                            <button class="shadow btn btn-danger" name="">Supprimer</button>
                        </form>

                </div>
            <?php
                    }
            ?>

        <?php
            }
        ?>
        </div>
    <?php
    }
    if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
    ?>
        <a href="<?= URL ?>ateliers/ajouter" class="shadow btn btn-success d-block col-4 m-auto mt-3 mb-3">Ajouter</a>
    <?php
    }
    ?>
</div>


<?php

$titre = "Ateliers";
$content = ob_get_clean();
require_once "views/Read/template.php";
