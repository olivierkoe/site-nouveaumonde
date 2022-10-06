<?php ob_start() ?>
<div class="m-2 p-2 border border-dark rounded-1">
    <form action="<?= URL ?>partenaires/modifValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="titre">Titre :</label>
        </div>
        <div>
            <input type="text" name="titre" id="titre" value="<?= $partenaires->getTitre() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="description">Description : <?= $partenaires->getDescription() ?></label>
        </div>
        <div>
            <input type="text" value="<?= $partenaires->getDescription() ?>" name="description" id="description" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="siteWeb">Site Web :</label>
        </div>
        <div>
            <input type="text" name="siteWeb" id="siteWeb" value="<?= $partenaires->getSiteWeb() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="email">Email :</label>
        </div>
        <div>
            <input type="text" name="email" id="email" value="<?= $partenaires->getEmail() ?>" class="form-control">
        </div>
        <div>
            <label for="image">Image actuel: (.avif)</label>
        </div>
        <div class="align-middle">
            <input type="hidden" value="<?= $partenaires->getImage() ?>" name="imagePresentation" id="imagePresentation" class="form-control">
            <img src="<?= URL ?>public/images/partenaire/<?= $partenaires->getImage() ?>" name="image<?= $partenaires->getTitre() ?>" alt="image" width="200px;">
        </div>
        <div>
            <input type="file" name="newImage" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div>
            <input type="hidden" value="<?= $partenaires->getId() ?>" name="id" id="id" class="form-control">
            <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Modification du partenaires : " . $partenaires->getTitre();
$content = ob_get_clean();
require_once "views/Read/template.php";
