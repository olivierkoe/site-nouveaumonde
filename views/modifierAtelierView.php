<?php ob_start() ?>

<div class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>ateliers/modifValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre" class="">Titre</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" value="<?= $atelier->getTitre() ?>" class="form-control">
        </div>

        <div class="input-group mb-1">
            <label for="pages" class="">Nombre de pages</label>
        </div>
        <div>
            <input type="text" value="<?= $atelier->getPages() ?>" name="pages" id="pages" class="form-control">
        </div>
        <div>
            <label for="image">Image : </label>
        </div>
        <div class="align-middle">
            <input type="hidden" value="<?= $atelier->getImage() ?>" name="image" id="image" class="form-control">
            <img src="<?= URL ?>public/images/<?= $atelier->getImage() ?>" name="image" alt="image" width="200px;">
        </div>
        <div class="input-group mb-1">
            <label for="image">Changer l'image :</label>
        </div>
        <div>
            <input type="file" name="newImage" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <input type="hidden" value="<?= $atelier->getId() ?>" name="id" id="id" class="form-control">
        <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Modification de l'atelier : " . $atelier->getTitre();
$content = ob_get_clean();
require_once "views/template.php";
