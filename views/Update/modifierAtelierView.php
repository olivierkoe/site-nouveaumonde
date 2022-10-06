<?php ob_start() ?>

<div class="m-2 p-2 border border-dark bg-light rounded-1">
    <form action="<?= URL ?>ateliers/modifValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre">Titre :</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" value="<?= $ateliers->getTitre() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="argument1">Argument 1 : <?= $ateliers->getargument1() ?></label>
        </div>
        <div>
            <input type="text" value="<?= $ateliers->getargument1() ?>" name="argument1" id="argument1" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="argument2">Argument 2 : <?= $ateliers->getargument2() ?></label>
        </div>
        <div>
            <input type="text" value="<?= $ateliers->getargument2() ?>" name="argument2" id="argument2" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="argument3">Argument 3 : <?= $ateliers->getArgument3() ?></label>
        </div>
        <div>
            <input type="text" value="<?= $ateliers->getArgument3() ?>" name="argument3" id="argument3" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="sourceArg1">Source argument 1 :</label>
        </div>
        <div>
            <input type="text" name="sourceArg1" id="sourceArg1" value="<?= $ateliers->getsourceArg1() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="sourceArg2">Source argument 2 :</label>
        </div>
        <div>
            <input type="text" name="sourceArg2" id="sourceArg2" value="<?= $ateliers->getsourceArg1() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="sourceArg2">Source argument 2 :</label>
        </div>
        <div>
            <input type="text" name="sourceArg2" id="sourceArg2" value="<?= $ateliers->getsourceArg1() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="prix1">Montant 1 argument :</label>
        </div>
        <div>
            <input type="text" name="prix1" id="prix1" value="<?= $ateliers->getPrix1() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="prix2">Montant 2 argument :</label>
        </div>
        <div>
            <input type="text" name="prix2" id="prix2" value="<?= $ateliers->getPrix2() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="prix3">Montant 3 argument :</label>
        </div>
        <div>
            <input type="text" name="prix3" id="prix3" value="<?= $ateliers->getPrix3() ?>" class="form-control">
        </div>
        <div>
            <input type="hidden" value="<?= $ateliers->getId() ?>" name="id" id="id" class="form-control">
            <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Modification de l'ateliers : " . $ateliers->getTitre();
$content = ob_get_clean();
require_once "views/Read/template.php";
