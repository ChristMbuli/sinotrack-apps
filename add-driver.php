<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require ("./backend/addAction.php");
require ("./backend/security.php");

?>
<!DOCTYPE html>
<html lang="en">

<?php include ('./components/head.php') ?>

<body>

    <?php include ('./components/navbar.php') ?>
    <?php include ('./components/link.php') ?>

    <!-- ------------------------ -->
    <div>
        <div class="bg-body-tertiaryp-5 rounded mt-5">
            <div class="col-sm-8 mx-auto">
                <h1>Ajouter un chauffeur et sa voiture</h1>

                <?php if (isset($errorMsg)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $errorMsg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } elseif (isset($successMsg)) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $successMsg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>

                <form class="row g-3 mt-4" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <input type="text" name="fname" placeholder="Nom & Prénom" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="phone" placeholder="Télephone" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="file" name="profil" class="form-control">
                    </div>

                    <hr>
                    <small>Informations voiture</small>
                    <div class="col-md-4">
                        <input type="text" name="marque" placeholder="Marque Voiture" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="vitesse" placeholder="Vitesse voiture km/h" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="reservoir" placeholder="Litre voiture Lt" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success" type="submit" name="save">Ajouter <i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include ("./components/footer.php") ?>
</body>

</html>