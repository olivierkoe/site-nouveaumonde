<?php ob_start() ?>

<div class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>conferences/modifValider" method="POST" enctype="multipart/form-data">
        <div class="mb-1">
            <label for="titre" class="col-2 pt-1">Titre :</label>
            <input class="col-6" type="text" name="titre" id="titre" value="<?= $conference->getTitre() ?>">
        </div>
        <div class="mb-1">
            <label for="invite" class="col-2">Invité (es)</label>
            <input class="col-6" type="text" value="<?= $conference->getInvite() ?>" name="invite" id="invite">
        </div>
        <div class="mb-1">
            <div>
                <label for="synopsis" class="col-2">Description soiré (es) :</label>
                <textarea id="synopsis" name="synopsis" rows="12" cols="100"><?= $conference->getSynopsis() ?></textarea>
            </div>
            <div>
                <label for="theme" class="col-2">Thème soiré (es) :</label>
                <textarea id="theme" name="theme" rows="1" cols="100"><?= $conference->getTheme() ?></textarea>
            </div>
            <div>
                <label for="heure" class="col-2">Démarage soiré (es) :</label>
                <textarea id="heure" name="heure" rows="1" cols="100"><?= $conference->getHeure() ?></textarea>
            </div>
            <div>
                <label for="date" class="col-2">Date soiré (es) :</label>
                <textarea id="date" name="date" rows="1" cols="100"><?= $conference->getDate() ?></textarea>
            </div>
            <div>
                <label for="image" class="col-2">Image existante : </label>
                <input type="hidden" value="<?= $conference->getImage() ?>" name="image" id="image" class="form-control">
                <img class="mt-2 mb-2" src="<?= URL ?>public/images/conferences/<?= $conference->getImage() ?>" name="image" alt="image" width="70px;">
            </div>
            <div class=" mb-1">
                <label for="image" class="col-2">Nouvelle image :</label>
                <input type="file" name="newImage" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            <input type="hidden" value="<?= $conference->getId() ?>" name="id" id="id" class="form-control">
            <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Modification de la conference : " . $conference->getTitre();
$content = ob_get_clean();
require_once "views/Read/template.php";
