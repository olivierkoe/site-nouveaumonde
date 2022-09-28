<?php ob_start() ?>


<form class="container col-4" action="<?= URL ?>connexionValider" method="POST">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
        <label class="form-check-label" for="checkboxx">Rester connecté ?</label>
    </div>
    <div class="mt-3 text-center">
        <button type="submit" class="btn btn-success">Se connecter</button>
        <a class="btn btn-info " href="<?= URL ?>inscription">Pas encore inscrit ?</a>
    </div>
</form>

<?php
$titre = "Page de connexion";
$content = ob_get_clean();
require_once "views/template.php";
