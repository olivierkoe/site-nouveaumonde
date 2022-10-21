<?php ob_start() ?>
<?php

?>
<div class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>conferences/valider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre" class=" col-1 pt-1 pe-2">Titre : </label>
            <input type="text" name="titre" id="titre" class="col-6">
        </div>
        <div class="input-group mb-1">
            <label for="invite" class=" col-1 pt-1 pe-2">invité : </label>
            <input type="text" name="invite" id="invite">
        </div>
        <div class="input-group mb-1">
            <label for="synopsis" class=" col-1 pt-1 pe-2">Déroulé de la soirée : </label>
            <input type="text" name="synopsis" id="synopsis">
        </div>
        <div class="input-group mb-1">
            <label for="theme" class=" col-1 pt-1 pe-2">Thème de la soirée : </label>
            <input type="text" name="theme" id="theme">
        </div>
        <div class="input-group mt-2 mb-1">
            <label for="date" class="col-1 pt-1 pe-2">Date : </label>
            <input type="date" name="date" id="date">
        </div>
        <div class="input-group mb-1">
            <label for="heure" class="col-1 pt-1 pe-2">Heure : </label>
            <input type="time" name="heure" id="heure">
        </div>
        <div class="input-group mb-1">
            <label for="image" class="col-1 pt-1 pe-2">Image :</label>
            <input type="file" name="image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <button class="btn btn-success mt-2">Validez</button>
    </form>

</div>
<?php
$titre = "Ajout conférence";
$content = ob_get_clean();
require_once "views/Read/template.php";
