<?php ob_start() ?>
<?php
?>
<div class="m-2 p-2 border border-dark rounded-1">
    <table class="table text_center">
        <tr>
            <td class="align-middle"><img src="<?= URL ?>public/images/<?= $atelier->getImage() ?>" alt="image" width="600vhm;"></td>
            <td>
                <div class="align-start mb-2">
                    <h1><?= $atelier->getTitre() ?></h1>
                </div><br>
                <label for="difficulte">Difficulté : <?= $atelier->getSmiley($atelier->getDifficulte()) ?></label><br />
                <label for="temps">Temps nécessaires : <?= $atelier->getTemps() ?></label><br />
                <label for="necessite">Necessité : <?= $atelier->getNecessite() ?></label><br /><br />
                <label for="materiaux">
                    <h3> nécessaires : </h3>
                </label>
                <div class="align-start"><?= $atelier->getMateriaux() ?></div><br>
                <label for="fabrication">
                    <h3>Fabrication : </h3>
                </label>
                <div class="align-start"><?= $atelier->getFabrication() ?></div><br>
                <label for="fonctionnement">
                    <h3>Fonctionnement :</h3>
                </label><br>
                <div class="align-start"><?= $atelier->getFonctionnement() ?></div>
            </td>
        </tr>
    </table>
</div>
<?php
$titre = $atelier->getTitre();
$content = ob_get_clean();
require_once "views/Read/template.php";
