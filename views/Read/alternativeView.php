<?php ob_start();
?>
<div class="m-2 p-2 bg-light">
    <table class="table">
        <th class="align-middle"><img src="<?= URL ?>public/images/alternatives/validation/<?= $alternative->getImage() ?>" alt="image <?= $alternative->getTitre() ?>" width="100%;"></th>
        <tr>
            <td>
                <div class="">
                    <h1><?= $alternative->getTitre() ?></h1>
                </div class="card d-flex flex-row flex-wrap">
                <label class="me-5" for="theme">Thème : <?= $alternative->getTheme() ?></label>
                <label class="me-5" for="site">Site internet : <?= $alternative->getSite() ?></label>
                <label for="email">Email adresse : <?= $alternative->getEmail() ?></label>
                <div class="d-flex flex-row flex-wrap mt-3">
                    <a href="<?= URL ?>alternatives/modifier/<?= $alternative->getId() ?>" class="btn btn-warning mb-3 me-5">Modifier</a>
                    <form action="<?= URL ?>alternatives/supprimer/<?= $alternative->getId() ?>" method="POST" onsubmit="confirm('Voulez vous vraiment supprimer cette alternative ?')">
                        <button class="btn btn-danger" name="supAlternative">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>

</div>
<?php
$titre = $alternative->getTitre();
$content = ob_get_clean();
require_once "views/Read/template.php";
