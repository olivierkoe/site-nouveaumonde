<?php ob_start() ?>

<p>accueil</p>

<?php

$titre = "Accueil";
$content = ob_get_clean();
require_once "template.php";
