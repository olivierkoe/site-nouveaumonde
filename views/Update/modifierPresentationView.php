<?php ob_start() ?>

<div id="modifierPresentation" class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>presentation/modifValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre">Titre :</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" value="<?= $presentation[0]->getTitre() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="description">Description :</label>
        </div>
        <div>
            <textarea rows="8" cols="155" name="description" id="description"><?= $presentation[0]->getDescription() ?></textarea>
        </div>
        <div class="input-group mb-1">
            <label for="contact">Contact:</label>
        </div>
        <div>
            <input type="text" name="contact" id="contact" value="<?= $presentation[0]->getContact() ?>" class="form-control">
        </div>
        <div>
            <label for="image">Image actuel: </label>
        </div>
        <div class="align-middle">
            <input type="hidden" value="<?= $presentation[0]->getImage() ?>" name="imagePresentation" id="imagePresentation" class="form-control">
            <img src="<?= URL ?>public/images/presentation/<?= $presentation[0]->getImage() ?>" name="image<?= $presentation[0]->getTitre() ?>" alt="image" width="200px;">
        </div>
        <div>
            <input type="file" name="newImage" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div>
            <input type="hidden" value="<?= $presentation[0]->getId() ?>" name="id" id="id" class="form-control">
            <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Modification de la page de présentation";
$content = ob_get_clean();
require_once "views/Read/template.php";
