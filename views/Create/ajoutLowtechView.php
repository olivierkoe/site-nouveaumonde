<?php ob_start() ?>
<?php

?>
<div class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>lowtechs/ajoutValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre" class="">Titre</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="difficulte" class="">Difficultée</label>
        </div>
        <div>
            <input type="number" name="difficulte" id="difficulte" min="0" max="10">
        </div>
        <div class="input-group mb-1">
            <label for="temps" class="">Temps de conception</label>
        </div>
        <div>
            <input type="text" name="temps" id="temps">
        </div>
        <div class="input-group mb-1">
            <label for="necessite" class="">Necessité</label>
        </div>
        <div>
            <input type="text" name="necessite" id="necessite" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="materiaux" class="">Materiaux necessaires</label>
        </div>
        <div>
            <textarea type="text" name="materiaux" id="materiaux" class="form-control"></textarea>
        </div>
        <div class="input-group mb-1">
            <label for="fabrication" class="">Fabrication</label>
        </div>
        <div>
            <textarea name="fabrication" id="fabrication" class="form-control"></textarea>
        </div>
        <div class="input-group mb-1">
            <label for="fonctionnement" class="">Fonctionnement</label>
        </div>
        <div>
            <textarea type="text" name="fonctionnement" id="fonctionnement" class="form-control"></textarea>
        </div>
        <div class="input-group mb-1">
            <label for="source" class="">Source :</label>
        </div>
        <div>
            <textarea type="text" name="source" id="source" class="form-control"></textarea>
        </div>
        <div class="input-group mb-1">
            <label for="image">Image</label>
        </div>
        <div>
            <input type="file" name="image" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <label for="imagePrincipe">Image de principe :</label>

        <div>
            <input type="file" name="imagePrincipe" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
</div>
<button class="btn btn-success mt-2">Validez</button>
</form>

</div>
<?php
$titre = "Ajout Lowtech";
$content = ob_get_clean();
require_once "views/Read/template.php";
