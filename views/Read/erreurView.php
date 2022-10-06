<?php
ob_start();

?>
<div class="container">
    <p class="p-auto bg-danger text-center text-warning border border-danger rounded-1"><?= $message; ?></p>
</div>
<?php $titre = "Erreurs";
$content = ob_get_clean();
require_once "views/Read/template.php";
