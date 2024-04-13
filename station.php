<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require ('./backend/tracerAction.php');


?>
<!DOCTYPE html>
<html lang="en">
<?php include ('./components/head.php') ?>

<body>
    <!-- <a href="index.php" style="color:black;">Accueil</a>
    <a href="new-driver.php" style="margin-left: 1rem;">Ajouter un chauffeur</a>
    <a href="list-driver.php" style="margin-left: 1rem;">Liste des chauffeurs</a> -->

    <?php include ('./components/navbar.php') ?>
    <!-- ------------------------- -->

    <div>
        <div class="bg-body-tertiaryp-5 rounded mt-5">
            <div class="col-sm-8 mx-auto">
                <h1>Station de Service</h1>
                <?php if (!empty($errorMsg)) { ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $errorMsg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } elseif (!empty($successMsg)) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $successMsg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>


                <form class="row g-3 mt-4" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label class="form-label">Votre Matricule</label>
                        <input type="text" name="tag" placeholder="Inserer votre matricule" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Scaner votre Badge</label>
                        <input type="file" name="qrcode" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Littre</label>
                        <input type="number" name="litres" placeholder="Nombre de Litre" class="form-control">

                    </div>


                    <div class="col-12">
                        <button class="btn btn-success" type="submit" name="submit">Faire le plein <i
                                class="fa-solid fa-oil-can"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include ("./components/footer.php") ?>
</body>

</html>