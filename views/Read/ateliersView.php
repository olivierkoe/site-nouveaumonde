<?php ob_start();

?>

<div class="m-2 p-2 border border-0 rounded-3">
    <h1 class="text-center">Atelier Scotche</h1>
    <?php
    foreach ($listeAteliers as $value) {
    ?>
        <div id="mainAtelier" class="card m-auto mb-1 d-flex flex-wrap" style="width: 100%;">
            <h2 class="card-title fs-3 mt-3 mb-1 text-center"><?= $value->getTitre() ?></h2>
            <h3 class="text-center fs-5 mb-3">Budget de l'état 250.7 mds € par an </h3>
            <div class="d-flex flex-row flex-wrap justify-content-evenly">

                <?php
                if (!empty($value->getArgument1())) {
                ?>
                    <article id="atelierCard" class="card col-5 p-3">
                        <h5> <?= $value->getArgument1() ?></h5>
                        <div>
                            <p class="align-middle">Pour un montant de <?= $value->getPrix1() ?> milliards € par an</p>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= (100 / 250.7) * $value->getPrix1() ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p id="legendeProgress" class="mt-1"><?= sprintf("%.2f", ((100 / 250.7) * $value->getPrix1())) ?> % du budget de l'état </p>
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
                    <article id="atelierCard" class="card mb-3 col-5 p-3">
                        <h5> <?= $value->getArgument2() ?></h5>
                        <div>
                            <p class="align-middle">Pour un montant de <?= $value->getPrix2() ?> milliards € par an </p>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= (100 / 250.7) * $value->getPrix2() ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p id="legendeProgress" class="mt-1"> <?= sprintf("%.2f", ((100 / 250.7) * $value->getPrix2())) ?> % du budget de l'état </p>
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
                    <article id="atelierCard" class="card mb-3 col-5 p-3">
                        <h5> <?= $value->getArgument3() ?></h5>
                        <div>
                            <p class="align-middle">Pour un montant de <?= $value->getPrix3() ?> milliards € par an</p>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= (100 / 250.7) * $value->getPrix3() ?>%;" aria-valuenow="25" aria-valuemin="50" aria-valuemax="100"></div>
                            </div>
                            <p id="legendeProgress" class="mt-1"><?= sprintf("%.2f", ((100 / 250.7) * $value->getPrix3())) ?> % du budget de l'état </p>
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
            ?>
                <div class="d-flex flex-row justify-content-center mt-3">
                    <p class="align-middle"><a href="<?= URL ?>ateliers/modifier/<?= $value->getId() ?>" class="btn btn-warning me-3">Modifier</a></p>
                    <?php
                    if ($_SESSION['role'] === "1") {
                    ?>
                        <p class="align-middle">
                        <form action="<?= URL ?>ateliers/supprimer/<?= $value->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                            <button class="btn btn-danger" name="">Supprimer</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
    <a href="<?= URL ?>ateliers/ajouter" class="btn btn-success d-block col-4 m-auto mt-3 mb-3">Ajouter</a>

</div>


<?php

$titre = "Ateliers";
$content = ob_get_clean();
require_once "views/Read/template.php";
