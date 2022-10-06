<?php ob_start() ?>
<?php
var_dump($_POST);
// var_dump($lowtech);
?>
<div class="m-2 p-2 m-3" id="principal">
    <table class="table">
        <tr class="text-center">
            <th><img src="<?= URL ?>public/images/lowtech/imagepresentation/<?= $lowtech->getImage() ?>" alt="image <?= $lowtech->getTitre() ?>" width="30%;"></th>
        </tr>

        <tr>
            <td class="bg-light p-5">
                <div class="align-start mb-2">
                    <h1><?= $lowtech->getTitre() ?></h1>
                </div><br>
                <label for="difficulte">Difficulté : <?= $lowtech->getSmiley($lowtech->getDifficulte()) ?></label><br />
                <label for="temps">Temps nécessaires : <?= $lowtech->getTemps() ?></label><br />
                <label for="necessite">Necessité : <?= $lowtech->getNecessite() ?></label><br /><br />


                <label for=" materiaux">
                    <h3> nécessaires : </h3>
                </label>
                <div class="align-start">
                    <?php foreach ($necessite as $value) {
                    ?>
                        <p><?= $value ?></p>
                    <?php
                    }  ?>
                </div>
                <label for="fabrication">
                    <h3>Fabrication : </h3>
                </label>
                <div class="align-start">
                    <?php foreach ($fabrication as $value) {
                    ?>
                        <p><?= $value ?></p>
                    <?php
                    }  ?>
                </div>
                <img class="mb-3" src="<?= URL ?>public/images/lowtech/imagePrincipe/<?= $lowtech->getImagePrincipe() ?>" alt="image <?= $lowtech->getTitre() ?>" width="30%;"><BR />
                <label for="fonctionnement">
                    <h3>Fonctionnement :</h3>
                </label><br>
                <div class="align-start">
                    <?php foreach ($fonctionnement as $value) {
                    ?>
                        <p><?= $value ?></p>
                    <?php
                    }
                    ?>
                </div>
                <label for="source">Source : <?= $lowtech->getSource() ?></label>
            </td>
        </tr>
    </table>
</div>

<?php
$titre = $lowtech->getTitre();
$content = ob_get_clean();
require_once "views/Read/template.php";
