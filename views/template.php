<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- ou href="https://bootswatch.com/5/sketchy/bootstrap.min.css" -->
    <title>Acceuil</title>
</head>

<body>
    <div class=" container mt-3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="accueil">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="livres">Livres
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" data-dashlane-rid="ffcb9853cdd8a4bd" data-form-type="">
                        <input class="form-control me-sm-2" type="text" placeholder="Search" data-dashlane-rid="be7e7cc6ddd8a5cf" data-form-type="">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit" data-dashlane-rid="d7453778dfbd86db" data-dashlane-label="true" data-form-type="">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <h1 class="rounded border border-dark m-2 p-2 text-center text-white bg-info"> <?= $titre ?></h1>

        <div>
            <?= $content ?>
        </div>
    </div>
</body>

</html>

















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>