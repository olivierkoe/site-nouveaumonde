<!-- Enclenche la temporisation de sortie -->
<?php ob_start() ?>

<div id="accueilcontainer" class="shadow container bg-light p-5 mb-5 text-center fs-3 mt-5" style="height: 60%">

    <!-- affiche le titre de la présentation -->
    <h1 class="mt-5 mb-5"><?= $fullPresentation[0]->getTitre() ?> </h1>
    <!-- affiche les differents éléments du descriptif stocker en base de données-->
    <?php foreach ($descriptionPresentation as $value) {
    ?>
        <p class=""><?= $value ?></p>
    <?php
    }  ?>

</div>
<?php
// si l'utilisateur à le rôle 1 ou le rôle 3 il pouras avoir accés au bouton modifier
if ($_SESSION['role'] === "1" || $_SESSION['role'] === "3") {
?>
    <div class="text-center">
        <a href="<?= URL ?>presentation/modifier" class="shadow btn btn-warning" id="navTitle">Modifier</a>
    </div>

<?php
}

$titre = "Accueil";

// Lit le contenu courant du tampon de sortie puis l'efface
$content = ob_get_clean();
// permet d'afficher la navbar ainssi que le footer
require_once "views/Read/template.php";
