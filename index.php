<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>SOMIREP</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
    <script src="https://kit.fontawesome.com/e147eaff6b.js" crossorigin="anonymous"></script>

    <style>
    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
</head>

<body>
    <?php include ('./components/link.php') ?>




    <div class="container py-3">
        <main>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal text-body-emphasis">SOMIREP</h1>
                <p class="fs-5 text-body-secondary">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
            </div>
            <div class="container px-4 py-1" id="custom-cards">
                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-3">
                    <div class="col">
                        <div class="card card-cover h-75 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                            style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://images.thebusinessplanshop.com/ouvrir-station-service/ouvrir-une-station-service.jpg');background-size:cover;">
                            <a href="station.php" class=" h-75 pb-5 text-white text-shadow-1 nav-link">
                                <ul class="d-flex list-unstyled">
                                    <li class="me-auto">
                                        <img src="https://static.vecteezy.com/ti/vecteur-libre/p1/4362456-open-lock-flat-design-long-shadow-icon-cadenas-vector-silhouette-symbol-vectoriel.jpg"
                                            alt="Bootstrap" width="32" height="32"
                                            class="rounded-circle border border-white">
                                    </li>
                                </ul>
                                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold text-center">Accueil</h3>

                            </a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card card-cover h-75 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                            style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://www.commententreprendre.com/wp-content/uploads/2022/02/Pourquoi-externaliser-la-reception-dappel-de-son-entreprise.jpg');background-size:cover;">
                            <a href="add-driver.php" class=" h-75 pb-5 text-white text-shadow-1 nav-link">
                                <ul class="d-flex list-unstyled">
                                    <?php if (!isset($_SESSION['auth'])) { ?>
                                    <li class="me-auto">
                                        <img src="https://cdn.pixabay.com/photo/2016/12/18/12/49/cyber-security-1915628_640.png"
                                            alt="Bootstrap" width="32" height="32"
                                            class="rounded-circle border border-white">
                                    </li>
                                    <?php } else { ?>
                                    <img src="https://static.vecteezy.com/ti/vecteur-libre/p1/4362456-open-lock-flat-design-long-shadow-icon-cadenas-vector-silhouette-symbol-vectoriel.jpg"
                                        alt="Bootstrap" width="32" height="32"
                                        class="rounded-circle border border-white">
                                    <?php } ?>
                                </ul>
                                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold text-center">Nouveau</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-cover h-75 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                            style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWae87zPJhE6gdmJwA8tbtdQl8OXOaw69txQ&s');background-size:cover;">
                            <a href="list-driver.php" class=" h-75 pb-5 text-white text-shadow-1 nav-link">
                                <ul class="d-flex list-unstyled">
                                    <?php if (!isset($_SESSION['auth'])) { ?>
                                    <li class="me-auto">
                                        <img src="https://cdn.pixabay.com/photo/2016/12/18/12/49/cyber-security-1915628_640.png"
                                            alt="Bootstrap" width="32" height="32"
                                            class="rounded-circle border border-white">
                                    </li>
                                    <?php } else { ?>
                                    <img src="https://static.vecteezy.com/ti/vecteur-libre/p1/4362456-open-lock-flat-design-long-shadow-icon-cadenas-vector-silhouette-symbol-vectoriel.jpg"
                                        alt="Bootstrap" width="32" height="32"
                                        class="rounded-circle border border-white">
                                    <?php } ?>
                                </ul>
                                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold text-center">Liste</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include ('./components/footer.php') ?>
    </div>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
