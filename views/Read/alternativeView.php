<?php ob_start();
?>
<div class="m-2 p-2 bg-light">
    <figure class="table">
        <div class="align-middle">
            <img src="<?= URL ?>public/images/alternatives/validation/<?= $alternative->getImage() ?>" alt="image <?= $alternative->getTitre() ?>" width="100%;">
        </div>
        <div class="card d-flex flex-row flex-wrap">
            <h1><?= $alternative->getTitre() ?></h1>
        </div>
        <label class="me-5" for="theme">Thème : <?= $alternative->getTheme() ?></label>
        <label class="me-5" for="site">Site internet : <?= $alternative->getSite() ?></label>
        <label for="email">Email adresse : <?= $alternative->getEmail() ?></label>
    </figure>
</div>
<?php
if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
?>
    <div class="d-flex flex-row flex-wrap mt-3">
        <div class="m-auto">
            <a href="<?= URL ?>alternatives/modifier/<?= $alternative->getId() ?>" class="btn btn-warning">Modifier </a>
            <?php
            if ($_SESSION['role'] === "1") {
            ?>
                <a href="<?= URL ?>alternatives/supprimer/<?= $alternative->getId() ?>" class="btn btn-danger">supprimer</a>

            <?php
            }
            ?>
        </div>
    <?php
}
    ?>
    </div>
    <?php
    $titre = $alternative->getTitre();
    $content = ob_get_clean();
    require_once "views/Read/template.php";
