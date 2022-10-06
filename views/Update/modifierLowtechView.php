<?php ob_start() ?>
<div class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>lowtechs/modifValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre">Titre :</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" value="<?= $lowtech->getTitre() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="difficulte">Difficulté : <?= $lowtech->getSmiley($lowtech->getDifficulte()) ?></label>
        </div>
        <div>
            <input type="text" value="<?= $lowtech->getDifficulte() ?>" name="difficulte" id="difficulte" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="temps">Temps nécessaire à sa réalisation :</label>
        </div>
        <div>
            <input type="text" name="temps" id="temps" value="<?= $lowtech->getTemps() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="necessite">Necessite :</label>
        </div>
        <div>
            <input type="text" name="necessite" id="necessite" value="<?= $lowtech->getNecessite() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="materiaux">Materiaux :</label>
        </div>
        <div>
            <input type="text" name="materiaux" id="materiaux" value="<?= $lowtech->getMateriaux() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="fabrication">Fabrication :</label>
        </div>
        <div>
            <input type="text" name="fabrication" id="fabrication" value="<?= $lowtech->getFabrication() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="fonctionnement">Fonctionnement :</label>
        </div>
        <div>
            <input type="text" name="fonctionnement" id="fonctionnement" value="<?= $lowtech->getFonctionnement() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="source">Source :</label>
        </div>
        <div>
            <input type="text" name="source" id="source" value="<?= $lowtech->getSource() ?>" class="form-control">
        </div>
        <div>
            <label for="image">Image actuel: (.webp)</label>
        </div>
        <div class="align-middle">
            <input type="hidden" value="<?= $lowtech->getImage() ?>" name="imagePresentation" id="imagePresentation" class="form-control">
            <img src="<?= URL ?>public/images/lowtech/imagepresentation/<?= $lowtech->getImage() ?>" name="image<?= $lowtech->getTitre() ?>" alt="image" width="200px;">
        </div>
        <div>
            <input type="file" name="newImage" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div>
            <label for="imagePrincipe">Image de principe actuel: </label>
        </div>
        <div class="align-middle">
            <input type="hidden" value="<?= $lowtech->getImagePrincipe() ?>" name="imagePrincipe" id="imagePrincipe" class="form-control">
            <img src="<?= URL ?>public/images/lowtech/imagePrincipe/<?= $lowtech->getImagePrincipe() ?>" name="imagePrincipe <?= $lowtech->getTitre() ?>" alt="image" width="200px;">
        </div>
        <div class="input-group mb-1">
            <label for="imagePrincipe">Changer l'image de principe : (.webp)</label>
        </div>
        <div>
            <input type="file" name="newImage2" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <input type="hidden" value="<?= $lowtech->getId() ?>" name="id" id="id" class="form-control">
        <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Modification de la lowtech : " . $lowtech->getTitre();
$content = ob_get_clean();
require_once "views/Read/template.php";
