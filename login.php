<?php session_start();
require ('./backend/loginAction.php') ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php include ('./components/head.php') ?>


<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <?php include ('./components/link.php') ?>

    <main class="form-signin w-100 m-auto">
        <form method="post">
            <p class="text-center" style="font-size:80px">
                <a href="index.php"><i class="fa-regular fa-circle-user"></i></a>
            </p>
            <h1 class="h3 mb-3 fw-bold text-center">Connexion </h1>

            <?php if (!empty($msgError)) { ?>
            <div class="alert alert-warning alert-danger fade show" role="alert">
                <?= $msgError ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>

            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="username" placeholder="Entrez le username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="mdp" class="form-control" placeholder="Entrez le mot passe">
                <label for="floatingPassword">Mot de passe</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="connexion">Connexion</button>
        </form>

    </main>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>