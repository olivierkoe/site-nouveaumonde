<?php ob_start();

?>

<div class="m-2 p-2 border border-dark rounded-1" id="principal">
    <table class="table text_center">
        <tr class="table-dark">
            <th class="ps-4"> Image</th>
            <th>LowTech</th>
            <th>Difficulté</th>
            <th>Temps necessaire</th>
            <th>Nécessité</th>
            <th colspan="2" class="ms-5">Actions</th>
        </tr>
        <tr>
            <?php
            foreach ($listeAteliers as $value) {
            ?>
                <td class="align-middle"><img src="<?= URL ?>public/images/<?= $value->getImage() ?>" alt="image" width="60px;"></td>
                <td class="align-middle"><a href="<?= URL ?>ateliers/atelier/<?= $value->getId() ?>"><?= $value->getTitre() ?></a></td>
                <td class="align-middle"><?= $value->getSmiley($value->getDifficulte()) ?></td>
                <td class="align-middle"><?= $value->getTemps() ?></td>
                <td class="align-middle"><?= $value->getNecessite() ?></td>
                <td class="align-middle"><a href="<?= URL ?>ateliers/modifier/<?= $value->getId() ?>" class="btn btn-warning">Modifier</a></td>
                <td class="align-middle">
                    <form action="<?= URL ?>ateliers/supprimer/<?= $value->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette atelier ?')">
                        <button class="btn btn-danger" name="">Supprimer</button>
                    </form>
                </td>
        </tr>
    <?php
            }
    ?>

    </table>
    <a href="<?= URL ?>ateliers/ajouter" class="btn btn-success d-block">Ajouter</a>
</div>
<?php

$titre = "Liste des ateliers";
$content = ob_get_clean();
require_once "views/template.php";
