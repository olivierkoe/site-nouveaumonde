<?php ob_start() ?>

<div class="m-2 p-2 border border-dark rounded-1">
    <table class="table text_center">
        <tr class="table-dark">
            <th class="ps-4"> Image</th>
            <th>Titre</th>
            <th>Nombre de pages</th>
            <th colspan="2" class="ms-5">Actions</th>
        </tr>
        <?php
        foreach ($Biblio as $value) {
        ?>
            <td class="align-middle"><img src="public/images/<?= $value->getImage() ?>" alt="image" width="60px;"></td>
            <td class="align-middle"><?= $value->getTitre() ?></td>
            <td class="ps-5 align-middle"><?= $value->getPages() ?></td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
            </tr>
        <?php
        }
        ?>

    </table>
    <a href="" class="btn btn-success d-block">Ajouter</a>
</div>
<?php
$titre = "Liste des livres";
$content = ob_get_clean();
require_once "template.php";
