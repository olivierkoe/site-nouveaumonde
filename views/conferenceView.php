<?php ob_start() ?>

<div class="m-2 p-2 bg-light" id="confbg">
    <table class="table">
        <th class="m-auto"><img src="<?= URL ?>public/images/conferences/<?= $conference->getImage() ?>" style="width: 100%;" alt="image<?= $conference->getTitre() ?>"></th>
        <tr>
            <td>
                <label for=" inviote">
                    <h1 class="mt-3"><?= $conference->getTitre() ?></h1>
                </label><br>
                <label for="invite">
                    <h4 class="fs-bold mt-3">Invité (s) : </h4><?= $conference->getInvite() ?>
                </label><br />
                <label for="theme">
                    <h4 class="fs-bold mt-3">Thème de la soirée : </h4> <?= $conference->getTheme() ?></br>
                </label>
                <label for="synopsis">
                    <h4 class="fs-bold mt-3">Description de la soirée : </h4> <?= $conference->getSynopsis() ?></br>
                </label>
                <label for="date" class="fs-bold mt-3">
                    Date : <?= $conference->getDate() ?>
                </label><br />
                <label for="heure" class="fs-bold mt-3">Heure : <?= $conference->getHeure() ?>
                </label>
            </td>
        </tr>
    </table>
</div>
<?php
$titre = $conference->getTitre();
$content = ob_get_clean();
require_once "views/template.php";
