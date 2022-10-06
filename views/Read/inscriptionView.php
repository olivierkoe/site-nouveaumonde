<?php ob_start() ?>

<form action="<?= URL ?>inscriptionValider" method="POST">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudoIn">
    </div>
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class="mb-3">
        <label for="mail" class="form-label">Mail</label>
        <input type="text" class="form-control" id="mail" name="mailIn">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="passwordIn">
    </div>
    <div class="mb-3">
        <label for="password2" class="form-label">Confirmer password</label>
        <input type="password" class="form-control" id="password2" name="password2In">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<?php
$titre = "Page d'inscription";
$content = ob_get_clean();
require_once "views/Read/template.php";
