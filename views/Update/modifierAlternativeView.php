<?php ob_start();

?>

<div class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>alternatives/modifValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre" class="">Titre</label>
        </div>

        <div>
            <input type="text" name="titre" id="titre" value="<?= $alternative->getTitre() ?>" class="form-control">
        </div>

        <div class="input-group mb-1">
            <label for="theme" class="">Thème</label>
        </div>
        <div>
            <input type="text" value="<?= $alternative->getTheme() ?>" name="theme" id="theme" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="email" class="">Email</label>
        </div>
        <div>
            <input type="text" value="<?= $alternative->getEmail() ?>" name="email" id="email" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="site" class="">Site internet</label>
        </div>
        <div>
            <input type="text" value="<?= $alternative->getSite() ?>" name="site" id="site" class="form-control">
        </div>
        <div>
            <label for="image">Image : </label>
        </div>
        <div class="align-middle">
            <input type="hidden" value="<?= $alternative->getImage() ?>" name="image" id="image" class="form-control">
            <img src="<?= URL ?>public/images/alternatives/validation/<?= $alternative->getImage() ?>" name="image" alt="image" width="20%;">
        </div>
        <div class="input-group mb-1">
            <label for="image">Changer l'image :</label>
        </div>
        <div>
            <input type="file" name="newImage" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <input type="hidden" value="<?= $_SESSION["pseudo"] ?>" name="modifAuth" id="modifAuth" class="form-control">
        </div>
        <input type="hidden" value="<?= $alternative->getId() ?>" name="id" id="id" class="form-control">
        <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Modification de la alternative : " . $alternative->getTitre();
$content = ob_get_clean();
require_once "views/Read/template.php";
