<?php ob_start();
?>

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        foreach ($listealternatives as $value) {
        ?>
            <div class="carousel-item active">
                <img src="<?= URL ?>public/images/alternatives/validation/<?= $value->getImage() ?>" class="d-block w-100" alt="image alternatives">
            </div>
        <?php
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div id="" class="d-flex flex-wrap flex-row">
    <?php
    if ($_SESSION['role'] === "1") {
    ?>
        <?php
        foreach ($listealternatives as $value) {
        ?>
            <div class="text-center bg-light mt-3 m-auto">
                <th>
                    <img src="<?= URL ?>public/images/alternatives/validation/<?= $value->getImage() ?>" class="ms-3" style="width: 200px;" alt="image alternatives">
                </th>
                <tr>
                    <h4><a class="ms-3" href="<?= URL ?>alternatives/alternative/<?= $value->getId() ?>"><?= $value->getTitre() ?></a></h4>
                </tr>
            </div>
        <?php
        }
        ?>

</div>
<div class="text-center">
    <a href="<?= URL ?>alternatives/ajouter" class="btn btn-success mb-3 mt-5">Ajouter</a>
</div>
<?php
    }
    $titre = "Alternatives";
    $content = ob_get_clean();
    require_once "views/Read/template.php";
