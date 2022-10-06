<?php ob_start() ?>
<?php

?>
<div class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>partenaires/ajoutValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre" class="">Titre :</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="description" class="">Description :</label>
        </div>
        <div>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="siteWeb" class="">Site Web :</label>
        </div>
        <div>
            <input type="text" name="siteWeb" id="siteWeb" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="email" class="">Adress Email :</label>
        </div>
        <div>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="image">Image :</label>
        </div>
        <div>
            <input type="file" name="image" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
</div>
<button class="btn btn-success mt-2">Validez</button>
</form>

</div>
<?php
$titre = "Ajout Partenaire";
$content = ob_get_clean();
require_once "views/Read/template.php";
