<?php ob_start() ?>


<div class="mb-5 p-3 mt-5 bg-light rounded-1">
    <form action="<?= URL ?>alternatives/ajoutValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre" class="">Titre</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="theme" class="">Thème</label>
        </div>
        <div>
            <input type="text" name="theme" id="theme" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="email" class="">Email</label>
        </div>
        <div>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="site" class="">Site web</label>
        </div>
        <div>
            <input type="text" name="site" id="site" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="image">Image</label>
        </div>
        <div>
            <input type="file" name="image" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <button class="btn btn-success mt-3">Validez</button>
    </form>

</div>
<?php
$titre = "Ajout alternative";
$content = ob_get_clean();
require_once "views/template.php";
