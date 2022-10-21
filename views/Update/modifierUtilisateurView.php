<?php ob_start() ?>
<div class="card col-6 p-2 border border-dark rounded-1 m-auto">
    <form action="<?= URL ?>utilisateurs/modifValider" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-1">
            <label for="pseudo">pseudo :</label>
        </div>
        <div>
            <input type="text" name="pseudo" id="pseudo" value="<?= $utilisateur->getPseudo() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="nom">Nom :</label>
        </div>
        <div>
            <input type="text" name="nom" id="nom" value="<?= $utilisateur->getNom() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="prenom">Prenom :</label>
        </div>
        <div>
            <input type="text" name="prenom" id="prenom" value="<?= $utilisateur->getPrenom() ?>" class="form-control">
        </div>
        <div class="input-group mb-1">
            <label for="mail">Mail :</label>
        </div>
        <div>
            <input type="text" name="mail" id="mail" value="<?= $utilisateur->getMail() ?>" class="form-control mb-2">
        </div>
        <?php
        if ($_SESSION['pseudo'] === $utilisateur->getPseudo()) {
        ?>
            <div class="mb-3">
                <div class="input-group mb-1">
                    <label for="password" class="form-label col-6">Password (8 characters minimum):</label>
                </div>
                <input type="password" id="password" name="password" minlength="8">
                <p class="mt-1 fst-italic">Votre mot de passe doit contenir au moins
                    <span id="minuscule" class="invalid">une minuscule,</span>
                    <span id="majuscule" class="invalid">une majuscule,</span>
                    <span id="chiffre" class="invalid">une chiffre,</span>
                    <span id="speciale" class="invalid">un caractère spécial ($@!%*#&),</span>
                    <span id="longueur" class="invalid">avoir une longueur d'au moins 8 caractères.</span>
                </p>
                </input>
                <div class="input-group mb-1">
                    <label for="confpassword">Confirmez votre mot de passe :</label>
                </div>
                <div>
                    <input type="password" name="confpassword" id="confpassword" minlength="8">
                </div>
            </div>
        <?php
        }
        ?>

        <?php
        if ($_SESSION['role'] === $utilisateur->getPseudo()) {
        ?>
            <div class="input-group mt-2 mb-1">
                <label for="role">Role :</label>
            </div>
        <?php
        }
        if ($_SESSION['role'] === "1") {
        ?>
            <div class="input-group mb-1">
                <label for="mail">Droit utilisateur : membre bureau, = 3 adhèrent = 2</label>
            </div>
            <div>
                <input type="text" name="role" id="role" value="<?= $utilisateur->getRole() ?>" class="form-control">
            </div>
        <?php
        }
        ?>
        <div>
            <label for="image">Image actuel: </label>
        </div>
        <div class="align-middle mb-2">
            <input type="hidden" value="<?= $utilisateur->getImage() ?>" name="image" id="image" class="form-control">
            <img src="<?= URL ?>public/images/utilisateurs/<?= $utilisateur->getImage() ?>" name="image<?= $utilisateur->getPseudo() ?>" alt="image" width="200px;">
        </div>
        <div>
            <input type="file" name="newImage" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <input type="hidden" value="<?= $utilisateur->getId() ?>" name="id" id="id" class="form-control">
        <button class="btn btn-success mt-2">Valider</button>
    </form>

</div>
<?php
$titre = "Modification de l'utilisateur " . $utilisateur->getPseudo();
$content = ob_get_clean();
require_once "views/Read/template.php";
