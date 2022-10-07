<?php ob_start() ?>

<div id="accueilcontainer" class="container bg-light p-3 mb-5 text-center fs-3 mt-5" style="height: 600px">
    <h1 class="mb-5">Le nouveau Monde Montpellier</h1>
    <p>Notre mouvement vise 3 objectifs : </p>
    <p>- Faire connaître les alertnatives concrètes et locales.</p>
    <p>- Rendre l'espace public et la parole politique au citoyen.</p>
    <p>- Créer du lien pour rassembler au-delà des clivages.</p>

    <p></p>
    <p>Comment ? </p>
    <p> En proposant des espaces et actions citoyennes, positives et originales : Apéros citoyens, ateliers de rencontre, semaine sans smartphone, collagede citations inspirantes, annimation de ciné/débat, stand dans les festivals</p>
</div>

<?php

$titre = "Accueil";
$content = ob_get_clean();
require_once "views/Read/template.php";
