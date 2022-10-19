<?php ob_start() ?>
<div class="card container p-3 col-8">
    <h3 class="m-auto mb-5">Page d'inscription au site du Nouveau Monde Montpellier</h3>
    <form action="<?= URL ?>inscriptionValider" method="POST">
        <div class="mb-3">
            <label for="pseudo" class="form-label col-6">Pseudo</label>
            <input type="text" class="pseudo" id="pseudo" name="pseudo" required>
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label col-6">Nom</label>
            <input type="text" class="nom" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label col-6">Prénom</label>
            <input type="text" class="prenom" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label col-6">Mail</label>
            <input type="mail" class="mail" id="mail" name="mail" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label col-6">Password (8 characters minimum):</label>
            <input type="password" id="password" name="password" minlength="8" required>
            <p class="mt-1 fst-italic">Votre mot de passe doit contenir au moins
                <span id="minuscule" class="invalid">une minuscule,</span>
                <span id="majuscule" class="invalid">une majuscule,</span>
                <span id="chiffre" class="invalid">une chiffre,</span>
                <span id="speciale" class="invalid">un caractère spécial ($@!%*#&),</span>
                <span id="longueur" class="invalid">avoir une longueur d'au moins 8 caractères.</span>
            </p>
            </input>
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label col-6">Confirmer password</label>
            <input type="password" class="password2" id="password2" name="password2" required>
        </div>
        <button type="submit" class="btn btn-primary">valider</button>
    </form>
</div>
<?php
$titre = "Page d'inscription";
$content = ob_get_clean();
require_once "views/Read/template.php";
