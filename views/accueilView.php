<?php ob_start() ?>

<div class="" style="height: 600px">

</div>

<?php

$titre = "Accueil";
$content = ob_get_clean();
require_once "template.php";
