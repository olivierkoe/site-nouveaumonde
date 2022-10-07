<?php ob_start() ?>
<?php

?>
<div class="m-2 p-2 border border-dark bg-light rounded-1">
    <form action="<?= URL ?>ateliers/valider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre" class="">Titre</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="argument1">Argument 1 :</label>
        </div>
        <div>
            <input type="text" value="" name="argument1" id="argument1" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="argument2">Argument 2 : </label>
        </div>
        <div>
            <input type="text" value="" name="argument2" id="argument2" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="argument3">Argument 3 :</label>
        </div>
        <div>
            <input type="text" value="" name="argument3" id="argument3" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="sourceArg1">Source argument 1 :</label>
        </div>
        <div>
            <input type="text" name="sourceArg1" id="sourceArg1" value="" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="sourceArg2">Source argument 2 :</label>
        </div>
        <div>
            <input type="text" name="sourceArg2" id="sourceArg2" value="" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="sourceArg2">Source argument 2 :</label>
        </div>
        <div>
            <input type="text" name="sourceArg2" id="sourceArg2" value="" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="prix1">Montant 1 argument :</label>
        </div>
        <div>
            <input type="text" name="prix1" id="prix1" value="" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="prix2">Montant 2 argument :</label>
        </div>
        <div>
            <input type="text" name="prix2" id="prix2" value="" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="prix3">Montant 3 argument :</label>
        </div>
        <div>
            <input type="text" name="prix3" id="prix3" value="" class="form-control">
        </div>
        <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Ajout Atelier";
$content = ob_get_clean();
require_once "views/Read/template.php";
